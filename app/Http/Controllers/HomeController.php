<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\UserRepo;
use App\Repositories\StudentRepo;
use App\Models\UserEventLog;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $user;
    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        $data = [];

        // For teamSA
        if(Qs::userIsTeamSA()) {
            $data['users'] = \App\User::all();
        }

        // For teachers
        if(Qs::userIsTeacher()) {
            $teacher_id = auth()->id();
            // Get classes taught by this teacher
            $classes = \App\Models\MyClass::whereHas('subjects', function($q) use ($teacher_id) {
                $q->where('teacher_id', $teacher_id);
            })->get();

            // Group students by class
            $students_by_class = [];
            foreach($classes as $class) {
                $students_by_class[$class->id] = [
                    'name' => $class->name,
                    'students' => \App\User::where('user_type', 'student')
                        ->whereHas('student_record', function($q) use ($class) {
                            $q->where('my_class_id', $class->id);
                        })->get()
                ];
            }
            $data['classes'] = $classes;
            $data['students_by_class'] = $students_by_class;
        }

        // For parents
        if(Qs::userIsParent()) {
            $students = app(\App\Repositories\StudentRepo::class)
                ->getRecord(['my_parent_id' => Auth::user()->id])
                ->with(['my_class', 'section', 'user'])
                ->get();
            $data['students'] = $students;
        } else {
            $students = [];
        }

        $logs = null;
        if (Auth::user() && Auth::user()->user_type === 'super_admin') {
            $logs = UserEventLog::latest()->take(20)->get(); // show last 20 logs
        }

        // Pass $students to the view, along with other variables
        return view('pages.support_team.dashboard', compact('users', 'students_by_class', 'logs'));
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function dashboard()
    {
        $users = collect(); // Always define $users as a collection
        $students_by_class = [];
        $logs = null;

        if(Qs::userIsTeamSA()){
            $users = \App\User::all();
            $userTypeCounts = [
                'students' => $users->where('user_type', 'student')->count(),
                'teachers' => $users->where('user_type', 'teacher')->count(),
                'admins' => $users->where('user_type', 'admin')->count(),
                'parents' => $users->where('user_type', 'parent')->count(),
            ];
        }

        if(Qs::userIsTeacher()){
            $teacher_id = auth()->id();
            $classes = \App\Models\MyClass::whereHas('subjects', function($q) use ($teacher_id) {
                $q->where('teacher_id', $teacher_id);
            })->get();

            foreach($classes as $class) {
                $students_by_class[$class->id] = [
                    'name' => $class->name,
                    'students' => \App\User::where('user_type', 'student')
                        ->whereHas('student_record', function($q) use ($class) {
                            $q->where('my_class_id', $class->id);
                        })->get()
                ];
            }
            $data['classes'] = $classes;
        }

        if(Qs::userIsParent()) {
            $students = app(\App\Repositories\StudentRepo::class)
                ->getRecord(['my_parent_id' => Auth::user()->id])
                ->with(['my_class', 'section', 'user'])
                ->get();
        } else {
            $students = [];
        }

        $userType = Auth::user()->user_type;

        if (Qs::userIsTeamSA() || Qs::userIsAdmin()) {
            // Show all announcements for super admin and admin
            $announcements = \App\Models\Announcement::orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        } else {
            // Show only announcements for the current user type
            $announcements = \App\Models\Announcement::whereJsonContains('visible_to', $userType)
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        return view('pages.support_team.dashboard', compact(
            'users',
            'students_by_class',
            'announcements',
            'logs',
            'userTypeCounts'
        ));
    }

    public function children()
    {
        $parent_id = Auth::id();
        $students = \App\Models\StudentRecord::where('parent_id', $parent_id)->get();
        return view('pages.parent.children', compact('students'));
    }
}

<?php

namespace App\Http\Controllers\MyParent;
use App\Http\Controllers\Controller;
use App\Repositories\StudentRepo;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentRecord;

class MyController extends Controller
{
    protected $student;
    public function __construct(StudentRepo $student)
    {
        $this->student = $student;
    }

    public function children()
    {
        $data['students'] = $this->student->getRecord(['my_parent_id' => Auth::user()->id])->with(['my_class', 'section'])->get();

        return view('pages.parent.children', $data);
    }

    public function fees()
    {
        $parent_id = Auth::id();
        $students = \App\Models\StudentRecord::with(['user', 'my_class', 'section'])
            ->where('my_parent_id', $parent_id) // <-- Fix here
            ->get();

        return view('pages.parent.fees', compact('students'));
    }
}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement; // <-- Add this line
use App\Helpers\Qs;

class AnnouncementController extends Controller
{
    public function index()
    {
        $userType = auth()->user()->user_type;

        if (Qs::userIsTeamSA() || Qs::userIsAdmin()) {
            // Show all announcements for super admin and admin
            $announcements = Announcement::orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        } else {
            // Show only announcements for the current user type
            $announcements = Announcement::whereJsonContains('visible_to', $userType)
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        return view('announcements.list', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'display_date' => 'nullable|date',
            'visible_to' => 'required|array',
        ]);

        Announcement::create([
            'title' => $request->title,
            'message' => $request->message,
            'display_date' => $request->display_date,
            'created_by' => auth()->id(),
            'visible_to' => $request->visible_to,
        ]);

        return redirect()->back()->with('success', 'Announcement posted.');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'display_date' => 'nullable|date',
            'visible_to' => 'required|array',
        ]);
        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'title' => $request->title,
            'message' => $request->message,
            'display_date' => $request->display_date,
            'visible_to' => $request->visible_to,
        ]);
        return redirect()->route('announcements.index')->with('success', 'Announcement updated.');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return redirect()->back()->with('success', 'Announcement deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LoggingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'super_admin']); // Only super admins
    }

    public function index(Request $request)
    {
        $query = Activity::query();

        // Filtering
        if ($request->filled('user')) {
            $query->whereHas('causer', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user . '%');
            });
        }
        if ($request->filled('action')) {
            $query->where('description', 'like', '%' . $request->action . '%');
        }
        if ($request->filled('log_name')) {
            $query->where('log_name', $request->log_name);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $logs = $query->latest()->paginate(20);

        return view('logs.index', compact('logs'));
    }
}
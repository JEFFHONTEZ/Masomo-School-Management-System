<?php

namespace App\Http\Controllers;

use App\Models\UserEventLog;

class LoggingController extends Controller
{
    public function index()
    {
        $logs = UserEventLog::latest()->paginate(50);
        return view('logs.index', compact('logs'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['name', 'email'];
    protected static $logName = 'student';
    protected static $logOnlyDirty = true;
}
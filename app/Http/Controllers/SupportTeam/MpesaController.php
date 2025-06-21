<?php
namespace App\Http\Controllers\SupportTeam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MpesaController extends Controller
{
    public function callback(Request $request)
    {
        \Log::info('Mpesa Callback:', $request->all());
        // Handle the callback data here

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Success']);
    }
}
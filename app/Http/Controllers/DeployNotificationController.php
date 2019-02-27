<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeployNotificationController extends Controller
{
    public function notify(Request $request)
    {
        return $request->all();
    }
}

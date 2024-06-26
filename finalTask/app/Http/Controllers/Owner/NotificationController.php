<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display notifications for the authenticated owner.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Retrieve notifications for the authenticated owner
        $notifications = auth()->user()->notifications;

        // Return view with notifications data
        return view('owner.notifications')->with('notifications', $notifications);
    }
}

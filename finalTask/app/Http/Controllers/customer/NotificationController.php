<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications for the authenticated customer.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve notifications for the authenticated customer
        $notifications = auth()->user()->notifications;

        // Return the view with notifications data
        return view('customer.notifications')->with('notifications', $notifications);
    }
}

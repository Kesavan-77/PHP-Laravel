<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display notifications view for the driver.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Return view for displaying notifications specific to drivers
        return view('driver.notifications');
    }
}

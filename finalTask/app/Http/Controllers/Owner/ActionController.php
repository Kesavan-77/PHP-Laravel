<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    /**
     * Handle action events (approve/reject) on trip details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionEvent(Request $request)
    {
        // Decode JSON data from request
        $userData = json_decode($request->trip_details);
        $tripDetails = json_decode($userData);

        // Find the trip by its UUID
        $trip = Trip::where('uuid', $tripDetails->trip_id)->first();

        // find user_id for notifying the user
        $user = User::find($trip->user_id);

        // Handle approval action
        if ($request->action == "approved") {
            $trip->where('uuid', $tripDetails->trip_id)->update([
                "status" => "approved"
            ]);

            // Delete notification associated with the action
            DB::table('notifications')->where('id', $request->notify_id)->delete();

            //message for user notification
            $message = 'your trip plan with vehicle '.$trip->vehicle_no.' on date from '.$trip->from_date.' to '.$trip->to_date.' has been approved';
            $user->notify(new UserFollowNotification(Auth::id(), Auth::user()->name, $message));

            // Redirect to owner notifications route with success message
            return redirect()->route('owner.notifications')->with('success', 'Plan has been approved successfully');
        }
        
        // Handle rejection action
        if ($request->action == "rejected") {
            $trip->where('uuid', $tripDetails->trip_id)->update([
                "status" => "rejected"
            ]);

            // Delete notification associated with the action
            DB::table('notifications')->where('id', $request->notify_id)->delete();

            //message for user notification
            $message = 'your trip plan with vehicle '.$trip->vehicle_no.' on date from '.$trip->from_date.' to '.$trip->to_date.' has been rejected';
            $user->notify(new UserFollowNotification(Auth::id(), Auth::user()->name, $message));

            // Redirect to owner notifications route with success message
            return redirect()->route('owner.notifications')->with('success', 'Plan has been rejected successfully');
        }

        // Handle any other actions or errors
        return redirect()->back()->with('error', 'Invalid action');
    }
}

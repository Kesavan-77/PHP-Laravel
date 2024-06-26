<?php

namespace App\Models;

use App\Notifications\UserFollowNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Trip extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uuid', 'user_id', 'vehicle_id', 'from_date', 'to_date',
        'from_location', 'to_locations', 'vehicle_no', 'status',
        'driver', 'proof_image', 'trip_description'
    ];

    protected $casts = [
        'to_locations' => 'array',
    ];

    /**
     * Define the relationship between Trip and User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship between Trip and Vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Boot function to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Handle logic after a Trip is created
        static::created(function ($trip) {
            // Retrieve the user ID of the vehicle associated with this trip
            $vehicleUserId = $trip->vehicle->user_id;
            
            // Find the user associated with the vehicle
            $user = User::find($vehicleUserId);

            // Retrieve current authenticated user ID and name
            $userId = Auth::id();
            $userName = Auth::user()->name;

            // Prepare notification message with trip details
            $message = [
                'trip_id' => $trip['uuid'],
                'proof_image' => $trip['proof_image'],
                'from_location' => $trip['from_location'],
                'to_locations' => $trip['to_locations'],
                'from_date' => $trip['from_date'],
                'to_date' => $trip['to_date'],
                'vehicle_no' => $trip['vehicle_no'],
                'driver' => $trip['driver'],
                'trip_description' => $trip['trip_description']
            ];

            // Encode message as JSON
            $message = json_encode($message);

            // Notify the user associated with the vehicle about the new trip
            if ($user) {
                $user->notify(new UserFollowNotification($userId, $userName, $message));
            } else {
                Log::warning('Vehicle not found for Trip ID: ' . $trip->id);
            }
        });
    }
}

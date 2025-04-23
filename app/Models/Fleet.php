<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    /** @use HasFactory<\Database\Factories\FleetFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'maximum_passenger',
        'miles',
        'category',
        'image',
    ];

    /**
     * Get the bookings for the fleet.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'requested_fleet');
    }
}

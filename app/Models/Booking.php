<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_vehicle',
        'id_user',
        'service_type',
        'name',
        'date',
        'notes',
        'ammount'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class)->withTimestamps();
    }
}

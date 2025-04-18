<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = [
        'firstname',
        'lastname',
        'age',
        'gender',
        'contact',
        'email',
        'marital',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'patient_id', 'id');
    }
    
}
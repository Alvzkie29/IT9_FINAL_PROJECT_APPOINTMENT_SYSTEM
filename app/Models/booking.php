<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'BookingId';
    
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'time',
        'concern',
        'status',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
    public function doctor()
    {
        return $this->belongsTo(AddDoctor::class, 'doctor_id', 'DoctorId');
    }

}

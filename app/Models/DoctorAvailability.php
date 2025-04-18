<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAvailability extends Model
{
    use HasFactory;

    protected  $primaryKey = "AvailabilityId";
    public $incrementing = true;
    protected $keyType = 'int'; 
    protected $fillable = [
        'DoctorId',
        'day',
        'start_time',
        'end_time',
    ];

    public function doctor()
    {
        return $this->belongsTo(AddDoctor::class, 'DoctorId', 'DoctorId');
}

}
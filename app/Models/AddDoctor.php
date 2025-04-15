<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddDoctor extends Model
{
    use HasFactory;

    protected $table = 'add_doctors';
    protected $primaryKey = 'DoctorId';
    public $incrementing = false;
    protected $fillable = [
        'image_path',
        'bio',
        'firstname',
        'lastname',
        'age',
        'gender',
        'contact',
        'email',
        'marital',
        'street',
        'city',
        'country',
        'postal',
        'specialization',
        'qualification',
    ];

    public function doctorAvailability(){
        return $this->hasMany(DoctorAvailability::class);
    }
    
}
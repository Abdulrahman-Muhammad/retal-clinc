<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'doctor_name',
        'doctor_specialization',
        'telephone_number',
        'description',
        'image'
    ];
    protected $primaryKey = 'doctor_id';

    public $incrementing = true;
}

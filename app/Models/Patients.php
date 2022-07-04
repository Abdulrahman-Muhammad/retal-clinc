<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;


    protected $fillable = [
        'patient_id',
        'telephone_number',
        'clinic_type',
        'patient_name',
        'res_date'
    ];
    protected $primaryKey = 'patient_id';

    public $incrementing = true;
}

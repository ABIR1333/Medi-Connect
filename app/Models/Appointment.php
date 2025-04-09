<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_appointment',
        'etat_appointment_id',
        'patient_id',
        'user_id',
        'observation',
        'controle',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function etat_appointment()
    {
        return $this->belongsTo(EtatAppointment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class EtatAppointment extends Model
{
    use HasFactory;

    protected $fillable = ['etat'];

    // Une consultation a un état
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}

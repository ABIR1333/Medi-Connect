<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'cin', 'nom', 'prenom', 'date_naissance', 'adresse', 'ville', 'telephone', 'sexe', 'coverture_sante_id', 'identifiant'
    ];

    // Un patient peut avoir plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function covertureSante()
    {
        return $this->belongsTo(CovertureSante::class);
    }
}
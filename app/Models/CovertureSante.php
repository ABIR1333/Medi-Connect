<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovertureSante extends Model
{
    use HasFactory;

    protected $fillable = ['coverture'];

    protected function patients(){
        return $this->hasMany(Patient::class);
    }
}

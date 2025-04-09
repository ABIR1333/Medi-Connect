<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service','couleur'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

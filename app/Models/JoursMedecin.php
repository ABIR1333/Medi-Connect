<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class JoursMedecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

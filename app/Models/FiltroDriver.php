<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiltroDriver extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'entrada1',
        'saida1',
        'entrada2',
        'saida2',
    ];
}

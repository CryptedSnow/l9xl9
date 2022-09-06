<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HunterModel extends Model
{
    use HasFactory;
    protected $table = "hunter";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome_hunter',
        'idade_hunter',
        'altura_hunter',
        'peso_hunter',
        'tipo_hunter',
        'tipo_nen',
        'tipo_sangue'
    ];
}
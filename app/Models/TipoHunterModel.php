<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHunterModel extends Model
{
    use HasFactory;
    protected $table = "tipos_hunters";
    protected $primary_key = 'id';
    protected $fillable = [
        'descricao',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNenModel extends Model
{
    use HasFactory;
    protected $table = "tipos_nens";
    protected $primary_key = 'id';
    protected $fillable = [
        'descricao',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvatarHunterModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "avatars_hunters";
    protected $primary_key = 'id';
    protected $fillable = [
        'hunter_id',
        'imagem',
    ];
    public function hunter()
    {
        return $this->belongsTo(HunterModel::class, 'hunter_id');
    }
}

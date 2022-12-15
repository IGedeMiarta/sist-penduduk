<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kepalaKel(){
        return $this->belongsTo(Penduduk::class,'kepala_kel');
    }
    public function keluarga(){
        return $this->hasMany(KK::class);
    }
}

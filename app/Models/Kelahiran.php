<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penduduk(){
        return $this->belongsTo(Penduduk::class);
    }
}

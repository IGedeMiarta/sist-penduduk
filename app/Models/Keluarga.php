<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function KartuKel(){
        return $this->belongsTo(KK::class,'id_kk');
    }

    public function Penduduk(){
        return $this->belongsTo(Penduduk::class,'id_penduduk');
    }
    public function stsKawin(){
        if($this->status_kawin){
            return 'KAWIN';
        }else{
            return 'BELUM KAWIN';
        }
    }
}

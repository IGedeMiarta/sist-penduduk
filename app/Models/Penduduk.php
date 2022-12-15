<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenkel(){
        if($this->jenis_kelamin == 'L'){
            return 'LAKI-LAKI';
        }else{
            return 'PEREMPUAN';
        }
    }
    public function getStatus(){
        // return $this->status;
        if ($this->status == 1){
            return '<span class="badge bg-success rounded-pill">Aktif</span>';
        }elseif($this->status == 2){
            return '<span class="badge bg-warning rounded-pill">Pindah</span>';
        }else{
            return '<span class="badge bg-danger rounded-pill">Meninggal</span>';
        }
    }
    public function ttl(){
        return $this->tmp_lahir . ', '.date('d M Y',strtotime($this->tgl_lahir));
    }

    public function kk(){
        return $this->hasMany(KK::class);
    }
    public function Agama(){
        return $this->belongsTo(Agama::class,'agama_id');
    }
    public function Pendidikan(){
        return $this->belongsTo(Pendidikan::class,'pendidikan_id');
    }
    public function Keluarga(){
        return $this->hasMany(Keluarga::class);
    }
}

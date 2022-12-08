<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenkel(){
        if($this->sex == 'L'){
            return 'Laki-laki';
        }else{
            return 'Perempuan';
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
}

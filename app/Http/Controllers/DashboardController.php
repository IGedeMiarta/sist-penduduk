<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pendatang;
use App\Models\Pindah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        $tanggal = date('d');
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
        $presentase = ($tanggal / $days_in_month)*100;
        $data['pr'] = floor($presentase);
        $data['datang'] = Pendatang::all()->count();
        $data['lahir'] = Kelahiran::all()->count();
        $data['pindah'] = Pindah::all()->count();
        $data['mati'] = Kematian::all()->count();
        return view('dashboard.index',$data);
    }
}

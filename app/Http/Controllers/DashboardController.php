<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        $tanggal = date('d');
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
        $presentase = ($tanggal / $days_in_month)*100;
        $data['pr'] = floor($presentase);
        return view('dashboard.index',$data);
    }
}

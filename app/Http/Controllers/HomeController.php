<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Area;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function runScript()
    {
        $command = escapeshellcmd('/home/mahfuz/stl/lara_g4s/pyzk/test_voice.py');
        $output = shell_exec($command);
    }

    public function getConnection()
    {
        $areas = DB::connection('mysql2')->table('personnel_area')->select('area_code', 'area_name')->get();

        /*$area = new Area;
        $area->setConnection('mysql2');
        $areas = $area->all();*/

        return $areas;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrafikAir;
use App\Models\PengukurAir;
use App\Models\LogAir;
use App\Models\AlaramAir;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alat = PengukurAir::with(['grafik_air','alaram'])->get();
        return view('home',compact('alat'));
    }
    public function get_data()
    {
        return GrafikAir::with(['pengukur_air',])->get();
    }
    public function create()
    {
        $alat = PengukurAir::with(['grafik_air','alaram'])->get();
        return view('create_pengukur_air',compact('alat'));
    }
    public function save(Request $request)
    {
        // dd($request->all());

        $p = new PengukurAir;
        $p->id_alat = $request->id_alat;
        $p->nama = $request->nama;
        $p->posisi = $request->posisi;
        $p->warna_label = $request->warna_label;
        $p->status = $request->status;
        $p->waktu = date('Y-m-d H:i:s',strtotime('now'));
        $p->save();
        return back();
    }
    public function alaram_on_off($id)
    {
        $alaram = AlaramAir::where('pengukur_air_id',$id)->first();
        if($alaram->status == 1)
        {
            $alaram->status = 0;
            $alaram->save();
        }else{
            $alaram->status = 1;
            $alaram->save();
        }
        return back();
    }

}

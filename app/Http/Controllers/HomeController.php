<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrafikAir;
use App\Models\PengukurAir;
use App\Models\LogAir;
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
        $alat = PengukurAir::with('grafik_air')->get();
        return view('home',compact('alat'));
    }
    public function get_data()
    {
        return GrafikAir::with('pengukur_air')->get();
    }
    public function create()
    {
        return view('create_pengukur_air');
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrafikAir;
use App\Models\PengukurAir;
use App\Models\LogAir;
use App\Models\AlaramAir;
use DataTables;
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
        $alaram = $this->get_alaram($id);
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
    public function nilai_air(Request $request)
    {
        if ($request->method() == 'GET') {
            return GrafikAir::where('pengukur_air_id',$request->id_alat)->first();
        }
        $grafik = GrafikAir::find($request->id);
        $grafik->batas_air = $request->batas_air;
        $grafik->nilai_awal = $request->nilai_awal;
        $grafik->save();
        return back();
    }
    protected function get_alaram($id)
    {
        return AlaramAir::where('pengukur_air_id',$id)->first();
    }
    public function set_nilai(Request $request)
    {
        if($request->method() == 'POST')
        {
            $grafik = GrafikAir::first();
            if($grafik)
            {
                $grafik->batas_air = $request->batas_air;
                $grafik->nilai_awal = $request->nilai_awal;
                $grafik->save();
            }

            return back();
        }
        return view('set-nilai');
    }
    public function report(Request $request)
    {
        if($request->ajax())
        {
            $users = LogAir::select(['id', 'pengukur_air_id', 'nilai'])->orderBy('id','desc');
            return DataTables::of($users)->make();
        }
        $log = LogAir::all();
        return view('report',compact('log'));
    }

}

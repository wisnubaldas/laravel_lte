<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrafikAir;
use App\Models\PengukurAir;
use App\Models\LogAir;
use Faker\Provider\Base as Faker;
class GrafikAirController extends Controller
{
    public function index()
    {
        return GrafikAir::all();
    }
    protected function log_air($id,$nilai)
    {
        $log = new LogAir;
        $log->pengukur_air_id = $id;
        $log->nilai = $nilai;
        $log->save();
    }
    protected function warna(Type $var = null)
    {
        $elem = Faker::randomElements([
            '255, 255, 102,',
            '0, 153, 51,',
            '0, 153, 204,',
            '204, 102, 255,',
            '255, 102, 0,',
            '0, 153, 153,',
            '255, 176, 0,'
        ]);
        return $elem[0];
    }
    public function create(Request $request)
    {
        $id_alat = PengukurAir::where('id_alat',$request->id_alat)->first();
        $id = $id_alat->id;
        $grafik = GrafikAir::firstOrNew([
            'pengukur_air_id'=>$id
        ]);
        $grafik->nilai = $request->nilai;
        $grafik->waktu = $request->waktu;
        $grafik->save();
        $this->log_air($id,$request->nilai);
        return $grafik->id;
    }
}

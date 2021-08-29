<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrafikAir;
use App\Models\PengukurAir;
use App\Models\AlaramAir;
use App\Models\LogAir;
use Faker\Provider\Base as Faker;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class GrafikAirController extends Controller
{
    public function index()
    {
        return GrafikAir::all();
    }
    public function get_status($id)
    {
        // $alat = PengukurAir::find($id);
        // if(!$alat)
        // {
        //     return abort(404);
        // }else{
        Log::debug('akses dari alat buat alaram');

            $alaram = AlaramAir::where('pengukur_air_id',1)->first();
            return $alaram->status;
            // if($alaram->status == $id)
            // {
            //     echo 1;
            // }else{
            //     echo 0;
            // }
        // }
    }
    public function send_status($id)
    {
        $alat = PengukurAir::find($id);
        if(!$alat)
        {
            return abort(404);
        }else{
            $alaram = AlaramAir::where('pengukur_air_id',$id)->update(['status'=>0]);
            echo 0;
        }
    }
    protected function log_air($id,$nilai)
    {
        $log = new LogAir;
        $log->pengukur_air_id = $id;
        $log->nilai = $nilai;
        $log->save();
    }
    public function create(Request $request,$id)
    {
        Log::debug('akses dari alat');
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
    public function data_bmkg()
    {
        $bandung = [];
        $response = Http::get('https://cuaca.umkt.ac.id/api/cuaca/DigitalForecast-JawaBarat.xml');
        $data = $response->collect();
        foreach ($data['row']['data']['forecast']['area'] as $key => $value) {

            if($value['@description'] == 'Bandung'){
                array_push($bandung,array_merge($value,$data['row']['data']['forecast']['issue']));
            }
        }
        file_put_contents(public_path('bmkg.json'),json_encode($bandung));
    }
    public function get_data_bmkg()
    {
        $bmkg = file_get_contents(public_path('bmkg.json'));
        $data = json_decode($bmkg,true);
        // dd($data);
        $currentDay = Carbon::now()->day()->format('m');
        if($data[0]['day'] !== $currentDay){
            $this->data_bmkg();
        }
        $response = [];
        foreach ($data as $key => $value) {
            $dataCuaca = [];
            foreach ($value['parameter'] as $p) {
                $r = array_key_last($p['timerange']);
                $r = $p['timerange'][$r];
                $val = [];
                if (isset($r['value']['@unit'])) {
                    if($p['@id'] == 'weather'){
                        $val[] = $this->cek_weather($r['value']['#text']);
                    }else{
                        $val[] = $r['value']['#text'].' '.$r['value']['@unit'];
                    }
                }else{
                    foreach ($r['value'] as $valx) {
                        $val[] = $valx['#text'].' '.$valx['@unit'];
                    }
                }
                array_push($dataCuaca,[
                    'id'=>$p['@id'],
                    'desc'=>$p['@description'],
                    'type'=>$r['@type'],
                    'datetime'=>$r['@datetime'],
                    'value'=>$val,
                ]);
            }
            array_push($response,[
                'lat'=>$value['@latitude'],
                'long'=>$value['@longitude'],
                'cor'=>$value['@coordinate'],
                'kota'=>$value['@description'],
                'propinsi'=>$value['@domain'],
                'waktu'=>Carbon::createFromFormat('YmdHis', $value['timestamp'])->format('d-m-Y H:i:s'),
                'cuaca'=>$dataCuaca,

            ]);
        }
        return $response;
    }
    protected function cek_weather($code)
    {
        $wt = [
            0 => 'Cerah',
            1 => 'Cerah Berawan',
            2 => 'Cerah Berawan',
            3 => 'Berawan',
            4 => 'Berawan Tebal',
            5 => 'Udara Kabur',
            10 => 'Asap',
            45 => 'Kabut',
            60 => 'Hujan Ringan',
            61 => 'Hujan Sedang',
            63 => 'Hujan Lebat',
            80 => 'Hujan Lokal',
            95 => 'Hujan Petir ',
            97 => 'Hujan Petir',
        ];
        return $wt[$code];
    }
}

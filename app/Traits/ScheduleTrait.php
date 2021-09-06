<?php
namespace App\Traits;
/**
 * kostum routing trait
 */
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
trait ScheduleTrait
{
    public static function getBmkg(string $wilayah, string $kota)
    {
        $response = Http::get('https://cuaca.umkt.ac.id/api/cuaca/'.$wilayah.'.xml');
        $data = $response->collect();
        $dataKota = [];
        foreach ($data['row']['data']['forecast']['area'] as $key => $value) {

            if($value['@description'] == $kota){
                array_push($dataKota,array_merge($value,$data['row']['data']['forecast']['issue']));
            }
        }
        file_put_contents(public_path('bmkg/'.strtolower($kota).'.json'),json_encode($dataKota));
        Log::info('BMKG '.$kota.' berhasil di update');
    }
}

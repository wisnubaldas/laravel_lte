<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PengukurAir;
class GrafikAir extends Model
{
    use HasFactory;
    protected $fillable = ['pengukur_air_id','nilai','nilai_awal','waktu'];
    public function pengukur_air()
    {
        return $this->belongsTo(PengukurAir::class);
    }
}

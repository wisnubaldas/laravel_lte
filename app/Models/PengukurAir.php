<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GrafikAir;
use App\Models\AlaramAir;
class PengukurAir extends Model
{
    use HasFactory;
    public function grafik_air()
    {
        return $this->hasOne(GrafikAir::class);
    }
    public function alaram()
    {
        return $this->hasOne(AlaramAir::class);
    }
}

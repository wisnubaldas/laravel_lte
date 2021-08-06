<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengukurAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengukur_airs', function (Blueprint $table) {
            $table->id();
            $table->string('id_alat');
            $table->string('nama');
            $table->string('posisi');
            $table->string('warna_label')->nullable();
            $table->dateTime('waktu');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengukur_airs');
    }
}

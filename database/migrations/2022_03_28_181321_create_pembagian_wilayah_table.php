<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembagianWilayahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembagian_wilayah', function (Blueprint $table) {
            $table->integer('kode_wilayah')->nullable();
            $table->string('nama_wilayah')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembagian_wilayah');
    }
}

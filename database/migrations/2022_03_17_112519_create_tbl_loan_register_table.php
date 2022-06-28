<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLoanRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_loan_register', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('noNIK');
            $table->string('email')->nullable();
            $table->string('notelp1');
            $table->string('notelp2')->nullable();
            $table->text('fotoKTP');
            $table->string('jenisKelamin');
            $table->date('tgl_lahir'); 
            $table->string('usahaKabupaten');
            $table->string('usahaKecamatan');
            $table->string('usahaDesaKel');
            $table->text('detailAlamat');
            $table->integer('jlhPengajuan');
            $table->integer('jangkaWaktu');
            $table->string('jnsUsaha');
            $table->string('ketIzinUsaha');
            $table->string('npwp')->nullable();
            $table->text('fotoTempatUsaha');
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
        Schema::dropIfExists('tbl_loan_register');
    }
}

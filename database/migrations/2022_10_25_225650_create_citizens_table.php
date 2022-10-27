<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->char('nama', 50);
            $table->char('tempat', 50);
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('jenis_kelamin_id');
            $table->char('alamat', 100);
            $table->integer('rt')->length('3')->unsigned();
            $table->integer('rw')->length('3')->unsigned();
            $table->char('kel_desa', 40);
            $table->char('kecamatan', 40);
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('status_perkawinan_id');
            $table->unsignedBigInteger('kewarganegaraan_id');
            $table->timestamps();

            $table->foreign('jenis_kelamin_id')->references('id')->on('genders');
            $table->foreign('agama_id')->references('id')->on('religions');
            $table->foreign('pekerjaan_id')->references('id')->on('jobs');
            $table->foreign('status_perkawinan_id')->references('id')->on('marital_statuses');
            $table->foreign('kewarganegaraan_id')->references('id')->on('citizenships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('citizens');
    }
};

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
        Schema::create('users_data', function (Blueprint $table) {
            $table->primary('nomor_induk');
            $table->string('nomor_induk');
            $table->string('nama');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('tanggal_lahir');
            $table->string("tempat_lahir");
            $table->integer("jenis_kelamin"); // 0 = Laki-laki; 1 = Perempuan
            $table->string("alamat");
            $table->string("notelepon");
            $table->binary("foto_profile")->nullable();
            $table->integer("jabatan"); // 0 = Dosen; 1 = Mahasiswa
            $table->rememberToken();
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
        Schema::dropIfExists('users_data');
    }
};

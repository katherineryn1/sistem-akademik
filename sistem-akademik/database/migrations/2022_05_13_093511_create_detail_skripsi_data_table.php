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
        Schema::create('detail_skripsi_data', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('komentar');
            $table->boolean("isAccepted");
            $table->date("tanggalAccepted");
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
        Schema::dropIfExists('detail_skripsi_data');
    }
};

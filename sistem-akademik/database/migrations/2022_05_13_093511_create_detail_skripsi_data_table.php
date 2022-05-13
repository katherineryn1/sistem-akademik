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
            $table->bigInteger('id_skripsi', false, true);
            $table->string('label');
            $table->string('komentar')->nullable();
            $table->boolean("is_accepted");
            $table->date("tanggal_accepted")->nullable();
            $table->foreign('id_skripsi')->references('id')->on("skripsi_data");
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

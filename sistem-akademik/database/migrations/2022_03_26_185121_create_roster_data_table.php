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
        Schema::create('roster_data', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->string("jam_mulai");
            $table->string("jam_selesai");
            $table->string("ruangan");
            $table->bigInteger("id_kurikulum" ,false,true);
            $table->foreign('id_kurikulum')->references('Id')->on("kurikulum_data");
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
        Schema::dropIfExists('roster_data');
    }
};

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
        Schema::create('nilai_data', function (Blueprint $table) {
            $table->id();
            $table->float("nilai_1")->nullable();
            $table->float("nilai_2")->nullable();
            $table->float("nilai_3")->nullable();
            $table->float("nilai_4")->nullable();
            $table->float("nilai_5")->nullable();
            $table->float("nilai_UAS")->nullable();
            $table->float("nilai_akhir")->nullable();
            $table->string("index")->nullable();
            $table->bigInteger("pengambilan_matakuliah",false,true);
            $table->foreign('pengambilan_matakuliah')->references('id')->on("pengambilan_matakuliah_data");
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
        Schema::dropIfExists('nilai_data');
    }
};

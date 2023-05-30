<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kdTransaksi")->nullable();
            $table->foreign("kdTransaksi")->references("id")->on("transaksi");
            $table->char("kdCoffee", 4)->nullable();
            $table->foreign("kdCoffee")->references("kdCoffee")->on("coffee");
            $table->integer("jumlahPembelian")->nullable();
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
        Schema::dropIfExists('detailpembelian');
    }
}

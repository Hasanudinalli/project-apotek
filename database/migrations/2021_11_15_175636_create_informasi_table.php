<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_barang');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->bigInteger('kategori_id')->unsigned();
            $table->string('gambar');
            $table->string('keterangan');


            $table->foreign("obat_id")->references('id')
            ->on('obat')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('informasi');
    }
}

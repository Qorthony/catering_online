<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataPelanggan', function (Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_user');
          $table->string('no_telp');
          $table->string('alamat',150);
        });

        Schema::create('order', function (Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_pelanggan');
          $table->unsignedInteger('id_produk');
          $table->string('nama_produk');
          $table->integer('harga');
          $table->integer('jumlah');
          $table->integer('total_harga');
          $table->time('tgl_order');
        });

        Schema::create('produk', function (Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_kategori');
          $table->string('nama_produk');
          $table->integer('harga');
          $table->string('description');
        });

        Schema::create('kategori', function (Blueprint $table)
        {
          $table->increments('id');
          $table->string('nama_kategori');
        });

        Schema::create('pembayaran', function (Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('id_order');
          $table->string('nama_produk');
          $table->integer('harga');
          $table->integer('jumlah');
          $table->integer('total_harga');
          $table->string('status');
          $table->time('tgl_order');
          $table->timestamps();
        });

        Schema::table('dataPelanggan', function (Blueprint $kolom)
        {
          $kolom->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('order', function (Blueprint $kolom)
        {
          $kolom->foreign('id_pelanggan')->references('id')->on('dataPelanggan')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('produk', function (Blueprint $kolom)
        {
          $kolom->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::table('pembayaran', function (Blueprint $kolom)
        {
          $kolom->foreign('id_order')->references('id')->on('order')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('dataPelanggan');
      Schema::drop('order');
      Schema::drop('produk');
      Schema::drop('pembayaran');
      Schema::drop('kategori');
    }
}

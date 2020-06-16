<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToPesanandetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
/*
    $table->integer('pesanan_id');
    $table->integer('produk_id');*/

    public function up()
    {
        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->integer('pesanan_id')->unsigned()->change();
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('pesanan_detail', function(Blueprint $table) {
            //
            $table->integer('produk_id')->unsigned()->change();
            $table->foreign('produk_id')->references('id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->dropForeign('pesanan_detail_pesanan_id_foreign');
        });

        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->dropIndex('pesanan_detail_pesanan_id_foreign');
        });

        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->integer('pesanan_id')->change();
        });

        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->dropForeign('pesanan_detail_produk_id_foreign');
        });

        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->dropIndex('pesanan_detail_produk_id_foreign');
        });

        Schema::table('pesanan_detail', function (Blueprint $table) {
            //
            $table->integer('produk_id')->change();
        });
    }
}

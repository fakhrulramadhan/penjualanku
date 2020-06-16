<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            //
            $table->integer('kategori_id')->unsigned()->change();
            $table->foreign('kategori_id')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            //
            $table->dropForeign('produk_kategori_id_foreign');
        });

        Schema::table('produk', function (Blueprint $table) {
            //
            $table->dropIndex('produk_kategori_id_foreign');

        });

        Schema::table('produk', function (Blueprint $table) {
            //
            $table->integer('kategori_id')->change();
        });
    }
}

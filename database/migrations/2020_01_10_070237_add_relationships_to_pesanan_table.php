<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->integer('pelanggan_id')->unsigned()->change();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');
       });

         Schema::table('pesanan', function (Blueprint $table) {
             //
             $table->integer('user_id')->unsigned()->change();
             $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->dropForeign('pesanan_pelanggan_id_foreign');

        });

        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->dropIndex('pesanan_pelanggan_id_foreign');

        });

        Schema::table('pesanan', function(Blueprint $table) {
            //
            $table->integer('pelanggan_id')->change();
        });

        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->dropForeign('pesanan_user_id_foreign');

        });

        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->dropIndex('pesanan_user_id_foreign');

        });

        Schema::table('pesanan', function(Blueprint $table) {
            //
            $table->integer('user_id')->change();
        });
    }
}

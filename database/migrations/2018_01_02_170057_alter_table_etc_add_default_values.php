<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEtcAddDefaultValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etc', function (Blueprint $table) {
            $table->integer('front_img1')->default(94951)->change();
            $table->integer('front_img2')->default(101030)->change();
            $table->integer('front_img3')->default(2084)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etc', function (Blueprint $table) {
            $table->integer('front_img1')->change();
            $table->integer('front_img2')->change();
            $table->integer('front_img3')->change();
        });
    }
}

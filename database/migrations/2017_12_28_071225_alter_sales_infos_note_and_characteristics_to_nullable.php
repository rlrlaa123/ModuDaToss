<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSalesInfosNoteAndCharacteristicsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_infos', function (Blueprint $table) {
            $table -> string('Characteristic')->nullable()->change();
            $table -> string('note')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_infos', function (Blueprint $table) {
            $table -> string('Characteristic')->nullable(false)->change();
            $table -> string('note')->nullable(false)->change();
        });
    }
}

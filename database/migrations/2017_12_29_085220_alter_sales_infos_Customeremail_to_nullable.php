<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSalesInfosCustomeremailToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_infos', function (Blueprint $table) {
            $table -> string('CustomerEmail')->nullable()->change();

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
            $table -> string('CustomerEmail')->nullable(false)->change();
        });
    }
}

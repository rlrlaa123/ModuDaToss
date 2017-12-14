<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToSavinghistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('savinghistories', function (Blueprint $table) {
            //
            $table->integer('triggerid')->nullable();
            $table->string('triggerName')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('savinghistories', function (Blueprint $table) {
            //
            $table->dropColumn('trigger');
            $table->dropColumn('triggerName');
        });
    }
}

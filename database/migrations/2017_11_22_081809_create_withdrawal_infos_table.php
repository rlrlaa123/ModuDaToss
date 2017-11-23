<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('memberID');
            $table->string('memberName');
            $table->string('bankName');
            $table->string('account_number');
            $table->integer('requestmoney');
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
        Schema::dropIfExists('withdrawal_infos');
    }
}

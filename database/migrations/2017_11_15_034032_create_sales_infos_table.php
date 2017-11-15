<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_infos', function (Blueprint $table) {
            $table->increments('salesinfo_id');

            $table->string('CustomerName');

            $table->string('BusinessName');

            $table->string('CustomerAddress');

            $table->string('PhoneNumber');

            $table->string('ContactTime');

            $table->string('Characteristic');
            //나중에 타입변경 요망
            $table->string('signature')->default('signature');

            $table->string('Category');

            $table->timestamps();

            $table->integer('state')->default(1);

            $table->string('note');

            $table->string('CustomerEmail')->unique();

            $table->integer('pay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_infos');
    }
}

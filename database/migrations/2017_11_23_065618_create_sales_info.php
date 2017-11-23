<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sales_infos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('CustomerName');

            $table->string('BusinessName');

            $table->string('CustomerAddress');

            $table->string('post_number');

            $table->string('CustomerAddress_detail')->nullable();

            $table->string('CustomerAddress_extra')->nullable();

            $table->string('PhoneNumber');

            $table->string('ContactTime');

            $table->string('Characteristic');
            //나중에 타입변경 요망
            $table->string('signature')->default('signature');

            $table->string('Category');

            $table->timestamps();

            $table->string('state')->default("접수 완료");

            $table->string('note');

            $table->string('CustomerEmail');

            $table->integer('pay');

            $table->integer('SalesPerson_id')->default(0);

            $table->string('Fail_reason')->default("none");

            $table->string('SP_name')->default("none");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('sales_infos');
    }
}

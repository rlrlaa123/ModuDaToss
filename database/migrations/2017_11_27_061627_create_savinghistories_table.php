<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavinghistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savinghistories', function (Blueprint $table) {
          
          $table->integer('SalesPerson_id');

          $table->string('SalesPerson_name');

          $table->string('MoneyType');

          $table->integer('MoneySum');

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
        Schema::dropIfExists('savinghistories');
    }
}

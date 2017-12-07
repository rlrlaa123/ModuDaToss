<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('income')->unsigned()->default(0);
            $table->boolean('gender'); /* 남자:0, 여자:1 */
            $table->integer('phoneNumber');
            $table->string('bankName');
            $table->string('accountNumber');
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->boolean('type'); /* 영업사원:0, 파트너: 1 */
            $table->string('recommender')->nullable();
            $table->string('recommend_code');
            $table->string('category')->nullable();
            $table->string('AclassRecommender')->nullable();

            $table->string('confirm_code', 60)->nullable();
            $table->boolean('activated')->default(0);

            $table->integer('Benefit')->default(0);
            $table->integer('Commision')->default(0);
            $table->integer('RecommenderCommision')->default(0);

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
        Schema::dropIfExists('users');
    }
}

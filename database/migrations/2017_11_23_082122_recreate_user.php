<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email')->unique();

            $table->string('password');

            $table->string('name');
            //enum 으로 다시 만들기
            $table->string('gender')->default("gender");
            //본인 인증?
            $table->string('phoneNumber')->default("none");
            
            $table->string('bankName')->default("none");
            //아마다른 형식이 필요할듯
            $table->string('account_number')->default("none");
            // string 말고 다른 타입 필요
            $table->string('photo')->default("photo");
            // 포토 타입 필요
            $table->string('signature')->default("signature");

            $table->integer('type')->default(0);

            $table->integer('Benefit')->default(0);

            $table->string('Recommender')->default('none');

            $table->integer('Commision')->default(0);

            $table->integer('RecommenderCommision')->default(0);

            $table->string('RecommenderCode')->default('none');

            $table->string('category')->default("none");

            $table->rememberToken();

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
        //
        Schema::dropIfExists('users');
    }
}

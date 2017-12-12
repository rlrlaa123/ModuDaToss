<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableForRegularMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->integer('phoneNumber')->nullable()->change();
            $table->string('bankName')->nullable()->change();
            $table->string('accountNumber')->nullable()->change();
            $table->string('recommend_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->integer('phoneNumber')->nullable(false)->change();
            $table->string('bankName')->nullable(false)->change();
            $table->string('accountNumber')->nullable(false)->change();
            $table->string('recommend_code')->nullable(false)->change();
        });
    }
}

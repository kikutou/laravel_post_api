<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('name')->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedInteger('mtb_address_prefecture_id')->nullable();
            $table->foreign('mtb_address_prefecture_id')->references('id')->on('mtb_address_prefectures');
            $table->text('address_detail')->nullable();
            $table->integer('gender_flg')->default('1')->comment('1,null 2,male 3,female');
            $table->softDeletes();
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
        Schema::dropIfExists('user_details');
    }
}

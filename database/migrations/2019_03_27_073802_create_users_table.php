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
            $table->string('email',50);
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->string('token',20);
            $table->string('code',6);
            $table->string('nickname',10)->nullable();
            $table->unsignedInteger('mtb_user_status_id');
            $table->foreign('mtb_user_status_id')->references('id')->on('mtb_user_statuses');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

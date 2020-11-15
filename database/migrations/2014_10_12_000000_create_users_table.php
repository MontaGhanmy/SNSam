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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('avatar')->nullable();
            $table->string('code')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('specialty')->nullable();
            $table->string('college_code')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('optin')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('invitation_id')->index()->nullable();
            $table->unsignedInteger('one_key_id')->index()->nullable();
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
        Schema::dropIfExists('users');
    }
}

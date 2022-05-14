<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->id();
           $table->text('image')->nullable();
           $table->string('f_name')->nullable();
           $table->string('l_name')->nullable();
           $table->string('name');
           $table->string('department')->nullable();
           $table->string('position')->nullable();
           $table->string('email')->unique();
           $table->timestamp('email_verified_at')->nullable();
           $table->string('password');
           $table->string('phone')->nullable();
           $table->string('country')->nullable();
           $table->string('state')->nullable();
           $table->string('city')->nullable();
           $table->string('zip_code')->nullable();
           $table->string('address')->nullable();
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

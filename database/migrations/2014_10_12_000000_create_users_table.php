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
            $table->increments('id');
            $table->string('name');
            $table->string('lastName')->nullable();
            $table->string('email')->unique();
            $table->string('location')->nullable();
            $table->string('year')->nullable();
            $table->string('study_field')->nullable();
            $table->string('music')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('series')->nullable();
            $table->string('gaming')->nullable();
            $table->string('books')->nullable();
            $table->string('travel')->nullable();
            $table->string('buddy')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable()->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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

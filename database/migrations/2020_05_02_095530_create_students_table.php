<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('year')->nullable();
            $table->string('study_field')->nullable();
            $table->string('music')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('series')->nullable();
            $table->string('gaming')->nullable();
            $table->string('books')->nullable();
            $table->string('travel')->nullable();
            $table->string('buddy')->nullable()->default('buddy');
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable()->default('');
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
        Schema::dropIfExists('students');
    }
}

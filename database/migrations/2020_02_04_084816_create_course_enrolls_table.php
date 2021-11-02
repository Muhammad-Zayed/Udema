<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_enrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_confirmed')->defualt(0);
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');



            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade');


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
        Schema::dropIfExists('course_enrolls');
    }
}

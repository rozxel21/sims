<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Faker\Provider\Uuid;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('course_guid')->default(Uuid::uuid());
            $table->string('course_abrr', 10)->unique();
            $table->string('course_name', 120);
            $table->string('college_id', 10);
            $table->timestamps();
            $table->boolean('course_status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('courses');
        Schema::dropIfExists('courses');
    }
}

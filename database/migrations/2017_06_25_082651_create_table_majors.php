<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMajors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
           $table->increments('id');
            $table->string('major_guid', 36)->unique();
            $table->string('major_name', 120);
            $table->string('course', 10);
            $table->timestamps();
            $table->boolean('major_status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('majors');
    }
}

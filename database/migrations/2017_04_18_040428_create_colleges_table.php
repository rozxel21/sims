<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Faker\Provider\Uuid;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('college_guid')->default(Uuid::uuid());
            $table->string('college_abrr', 10)->unique();
            $table->string('college_name', 120);
            $table->timestamps();
            $table->boolean('college_status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::drop('colleges');
        //Schema::dropIfExists('colleges');
    }
}

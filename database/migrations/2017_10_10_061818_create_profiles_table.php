<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reader_id')->unsigned();
            $table->string('truename')->nullable();
            $table->string('sex')->nullable();
            $table->string('school')->default('Northwestern Polytechnical University');
            $table->string('scode')->unique();
            $table->string('major')->nullable();
            $table->string('phone')->nullable();

            $table->foreign('reader_id')->references('id')->on('readers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

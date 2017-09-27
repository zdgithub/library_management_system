<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barcode', 255)->unique();
            $table->unsignedInteger('book_id');
            $table->text('location');
            $table->integer('state');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_items');
    }
}

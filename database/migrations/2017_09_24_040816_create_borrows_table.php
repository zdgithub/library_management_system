<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_item_id');
            $table->integer('user_id')->unsigned();
            $table->dateTime('borrow_date');
            $table->dateTime('return_date');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_item_id')->references('id')->on('book_items');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}

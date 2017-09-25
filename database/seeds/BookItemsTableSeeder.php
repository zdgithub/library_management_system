<?php

use Illuminate\Database\Seeder;

class BookItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_items')->insert([
        ['barcode' => '7654321', 'book_id' => 5, 'location' => 'first floor T11', 'state' => 1],
        ['barcode' => '7654322', 'book_id' => 5, 'location' => 'first floor T11', 'state' => 0],
        ['barcode' => '7654323', 'book_id' => 6, 'location' => 'first floor T12', 'state' => 1]
      ]);
    }
}

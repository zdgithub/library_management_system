<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Books;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('books')->insert([
          ['isbn' => '123-456-789-1111', 'name' => 'The Little Prince', 'author' => 'Helen','publisher' => 'Beijing Industry Press', 'price' => '32.41', 'total_num' => 0],
          ['isbn' => '123-456-789-1112', 'name' => 'Oliver Twist', 'author' => 'Mike', 'publisher' => 'Telecom Press', 'price' => '15.64', 'total_num' => 0]
        ]);
    }
}

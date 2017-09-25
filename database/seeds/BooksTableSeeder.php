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
          ['isbn' => '978-7-115-39409-5', 'name' => 'The Little Prince', 'author' => 'Helen','publisher' => 'Beijing Industry Press', 'price' => '32.41', 'total_num' => 10],
          ['isbn' => '960-1-123-12223-4', 'name' => 'Oliver Twist', 'author' => 'Mike', 'publisher' => 'Telecom Press', 'price' => '15.64', 'total_num' => 6]
        ]);
    }
}

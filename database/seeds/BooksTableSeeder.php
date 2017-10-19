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
          ['isbn' => '1234567890', 'name' => 'The Little Prince', 'author' => 'Helen','publisher' => 'Beijing Industry Press', 'price' => '32.41', 'total_num' => 1, 'location' => 'first floor D01'],
          ['isbn' => '1234567891', 'name' => 'Oliver Twist', 'author' => 'Mike', 'publisher' => 'Telecom Press', 'price' => '15.64', 'total_num' => 2, 'location' => 'second floor H15'],

        ]);
    }
}

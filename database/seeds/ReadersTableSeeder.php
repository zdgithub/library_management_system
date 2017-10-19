<?php

use Illuminate\Database\Seeder;

class ReadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('readers')->insert([
        ['name' => 'Xiao Wang', 'email' => 'reader1@qq.com', 'password' => bcrypt('123456')],
        ['name' => 'Da Li', 'email' => 'reader2@qq.com', 'password' => bcrypt('123456')],
      ]);

    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'librarian', 'email' => 'lib@qq.com', 'password' => bcrypt('123456')],
        ]);
    }
}

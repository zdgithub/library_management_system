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
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123456'), 'role' => 2],
            ['name' => 'librarian', 'email' => 'lib@qq.com', 'password' => bcrypt('123456'), 'role'=> 1],
            ['name' => 'librarianTwo', 'email' => 'lib2@qq.com', 'password' => bcrypt('123456'), 'role'=> 0],
        ]);
    }
}

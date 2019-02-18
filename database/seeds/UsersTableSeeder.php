<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1'),
        ]);

        DB::table('users')->insert([
            'name' => 'mario',
            'email' => 'mario@gmail.com',
            'password' => bcrypt('bmsuser123'),
        ]);

        // DB::table('users')->insert([
        //     'name' => 'skerdi',
        //     'email' => 'skerdi@gmail.com',
        //     'password' => bcrypt('skerdi'),
        // ]);
    }
}

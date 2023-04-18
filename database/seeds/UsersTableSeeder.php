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
        App\User::create(['name'=>'Muhammad Natsir','email'=>'natsir@gmail.com','password'=>Hash::make('samarinda'),'role'=>'administrator']);
        App\User::create(['name'=>'Yugoh','email'=>'yugojiro@gmail.com','password'=>Hash::make('samarinda'),'role'=>'editor']);
    }
}

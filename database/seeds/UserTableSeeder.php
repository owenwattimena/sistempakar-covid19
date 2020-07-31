<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "name" => 'Owen Wattimena',
            "username" => 'wentox_wtt',
            "password" => Hash::make('1234567890')
        ]);
    }
}
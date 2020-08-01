<?php

use Illuminate\Database\Seeder;
use App\Info;
class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Info::create(
            [
                "info" => "TENTANG",
                "body" => "tentang"
            ]
        );
        Info::create(
            [
                "info" => "PENCEGAHAN",
                "body" => "pencegahan"
            ]
        );
        Info::create(
            [
                "info" => "DEVELOPER",
                "body" => "defeloper"
            ]
        );
    }
}
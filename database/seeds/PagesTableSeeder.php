<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $title = ['About Us','Career','Disclaimer','Privacy Policy'];

        $i = 0;
        foreach(range(1,4) as $index){
        	$desc = $faker->realText($maxNbChars = 1000);
        	$image = $faker->imageUrl($width=50,$height=50);

        	App\Page::create(['title'=>$title[$i],'slug'=>$title[$i],'description'=>$desc,'image'=>$image,'published'=>1,'user_id'=>rand(1,2)]);
        	$i++;
        }
    }
}

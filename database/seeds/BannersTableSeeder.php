<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$carbon = new Carbon();
        $now = Carbon::now();
        $monthend = $now->endOfMonth();
        $faker = Faker::create();

        $images = ['1208667211.gif', '1296360958.gif', '1974df17df26b07604a09aa10a65dd4a.jpg','imgad.gif'];

        App\Banner::create(['title'=>'250 Nonton Bioskop','image'=>$images[0],'url'=>'http://samarindaweb.com','user_id'=>rand(1,2),'published'=>1,'instansi'=>'PT. Test','startdate'=>Carbon::now(),'enddate'=>$monthend]);
        App\Banner::create(['title'=>'930 Order MCD','image'=>$images[1],'url'=>'http://samarindaweb.com','user_id'=>rand(1,2),'published'=>1,'instansi'=>'Dinas Test','startdate'=>Carbon::now(),'enddate'=>$monthend]);
        App\Banner::create(['title'=>'250 Wawancara Tom Hank','image'=>$images[2],'url'=>'http://samarindaweb.com','user_id'=>rand(1,2),'published'=>1,'instansi'=>'PT. Test 250','startdate'=>Carbon::now(),'enddate'=>$monthend]);
        App\Banner::create(['title'=>'930 XL prioritas','image'=>$images[3],'url'=>'http://samarindaweb.com','user_id'=>rand(1,2),'published'=>1,'instansi'=>'PT. Test 930','startdate'=>Carbon::now(),'enddate'=>$monthend]);
    }
}

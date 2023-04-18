<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

    	$kategori = ['kecamatan', 'ekonomi','fokus','olahraga','fashion','kesehatan','film','advetorial','entertainment','nasional','pemerintah','pendidikan','perundangan','Anggana', 'Kembang Janggut','kenohan','kota bangun','loa janan','loa kulu','marang kayu','muara badak','muara jawa','muara kaman','muara muntai','muara wis','samboja','sanga-sanga','sebulu','tabang','tenggarong','tenggarong seberang'];

    	$labels = ['film','teknologi','kecamatan','tenggarong','film', 'kuliner','fashion','style','travel','dating','samarinda','balikpapan','nasional'];

    	$i = 0;
    	foreach(range(1,count($kategori)) as $index){
            $category = App\Category::create(['title'=>$kategori[$i],'slug'=>$kategori[$i],'description'=>$faker->sentence]);
    		$i++;
    	}
        $childs = [App\Category::find(1), App\Category::find(8), App\Category::find(9), App\Category::find(10), App\Category::find(11), App\Category::find(12)];
        $childs_ekonomi = [App\Category::find(3),App\Category::find(4),App\Category::find(5),App\Category::find(6),App\Category::find(7)];

        $child = 14;
        foreach(range(1,count($kategori)-13) as $index){
            App\Category::find(1)->childs()->save(App\Category::find($child));
            $child++;
        }
        App\Category::find(3)->childs()->saveMany($childs);
        App\Category::find(2)->childs()->saveMany($childs_ekonomi);



    	$l = 0;
    	foreach(range(1,count($labels)) as $index){
    		$label = App\Label::create(['title'=>$labels[$l],'slug'=>$labels[$l], 'description'=>$faker->realText($maxNbChars = 500)]);
    		$l++;
    	}

        foreach(range(1,40) as $index){
        	$title = $faker->realText($maxNbChars = 70);
        	$desc = $faker->realText($maxNbChars = 500);
        	$image = 'img-'.rand(1,7).'.jpg';

        	$post = App\Post::create(['title'=>$title,'slug'=>$title,'description'=>$desc,'image'=>'','published'=>1,'user_id'=>rand(1,2),'headnews'=>rand(0,1),'breaking'=>rand(0,1)]);

        	/*$post->category()->attach(rand(1,9));
        	$post->label()->attach([rand(1,4),rand(5,8),rand(9,13)]);*/

            $post->category()->attach(rand(1,3));
            $post->label()->attach([rand(1,4),rand(5,8),rand(9,13)]);
        }
        $image_kabupaten = 'img-'.rand(1,7).'.jpg';
        $post_kabupaten = App\Post::create(['title'=>$faker->realText($maxNbChars = 70),'slug'=>$faker->realText($maxNbChars = 70),'description'=>$desc = $faker->realText($maxNbChars = 500),'image'=>'','published'=>1,'user_id'=>rand(1,2),'headnews'=>rand(0,1),'breaking'=>rand(0,1)]);
        $post_kabupaten->category()->attach(14);
    }
}

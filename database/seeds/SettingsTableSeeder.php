<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homepage = serialize([
            'sidebar-left'    => ['widget-social-1','widget-news-1','widget-kecamatan-1','widget-lifestyle-1'],
            'ads-bottom-head' => ['ads-930-1'],
            'sidebar-300'     => ['widget-news-2','widget-list-populer-1'],
            'ads-middle'      => ['ads-930-2'],
            'col-area-3'      => ['widget-tab-news-1', 'widget-tab-news-2', 'widget-tab-news-3'],
            'col-area-4'      => ['widget-photo-post-1', 'ads-250-1'],
            'sidebar'         => ['widget-news-3', 'widget-facebook-1']
        ]);
        $single = serialize([
            'ads-top'=>[],
            'sidebar'=>['widget-list-images-news-1','widget-news-4','widget-facebook-2']
        ]);
        $category = serialize([
            'ads-top'=>[],
            'sidebar-left'=>['ads-250-2','widget-photo-post-2'],
            'sidebar'=>['widget-list-images-news-2','widget-facebook-3'],
        ]);
        $kecamatan = serialize([
            'ads-top'=>[],
            'sidebar-left'=>['widget-social-2','widget-kecamatan-2','widget-photo-post-3'],
            'sidebar'=>['widget-list-images-news-3', 'widget-facebook-4']
        ]);
        $widget_list_images_news = serialize([
            1=>['title'=>'', 'count'=>7],
            2=>['title'=>'', 'count'=>7],
            3=>['title'=>'', 'count'=>7],
        ]);
        $widget_social = serialize([
            1=>['title'=>''],
            2=>['title'=>''],
        ]);
        $widget_news = serialize([
            1=>['title'=>'Berita Kecamatan','id'=>1,'count'=>5],
            2=>['title'=>'','id'=>1,'count'=>5],
            3=>['title'=>'Berita Kecamatan','id'=>1,'count'=>5],
            4=>['title'=>'Berita Kecamatan','id'=>1,'count'=>5],
        ]);
        $widget_kecamatan = serialize([
            1=>['title'=>'Kecamatan','id'=>1],
            2=>['title'=>'Kecamatan','id'=>1]
        ]);
        $widget_lifestyle = serialize([
            1=>['title'=>'Focus','id'=>3,'count'=>5],
        ]);
        $widget_ads_930 = serialize([
            1=>['title'=>'ads-930','id'=>[2],'format'=>'choose'],
            2=>['title'=>'ads-930','id'=>[2,4],'format'=>'choose'],
        ]);
        $widget_ads_250 = serialize([
            1=>['title'=>'ads-250','id'=>[1],'format'=>'choose'],
            2=>['title'=>'ads-250','id'=>[1],'format'=>'choose'],
        ]);
        $widget_ads_300 = serialize([]);
        $widget_photo_post = serialize([
            1=>['title'=>'Fashion', 'id'=>3, 'count'=>2],
            2=>['title'=>'Fashion', 'id'=>3, 'count'=>2],
            3=>['title'=>'Ekonomi Masyarakat', 'id'=>3, 'count'=>2]
        ]);
        $widget_list_populer = serialize([
            1=>['title'=>'','count'=>10],
        ]); 
        $widget_tab_news = serialize([
            1=>['title'=>'Kecamatan','id'=>1,'count'=>4],
            2=>['title'=>'Kecamatan','id'=>2,'count'=>4],
            3=>['title'=>'Kecamatan','id'=>3,'count'=>4],
        ]);
        $widget_facebook = serialize([
            1=>['title'=>'','id'=>'mitrakukar'],
            2=>['title'=>'','id'=>'mitrakukar'],
            3=>['title'=>'','id'=>'mitrakukar'],
            4=>['title'=>'','id'=>'mitrakukar'],
        ]);

        $contact = serialize([
            'name' => 'Wamet (Warta Mahakam Etam)',
            'address' => 'Jl. Arjuna No.19 Tenggarong Kutai-Kartanegara',
            'telp' => '008000000000, 0070000000',
            'email' => 'yugojiro@gmail.com, yusuf@samarindaweb.com'
        ]);
        $getmail = serialize([1 =>'yugojiro@gmail.com', 2 =>'yusuf@samarindaweb.com', 3 =>'']);
        $desc = 'Wament.com adalah website berita dan informasi mengenai Kabupaten Kutai Kartanegara. <br><br>It was popularised in the 1960s with the release of Letraset sheets containing.<br><br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC...';
        $footer_kategori = serialize([
            'kategori-1'=> [
                'name'=>'Kategori 1',
                'id'=>3,
            ], 
            'kategori-2'=>[
                'name'=>'Ekonomi Masyarakat',
                'id'=>2,
            ],
        ]);
        $settings = [
        	'sitename' => 'Habar.Co',
        	'slogan' => 'Habar Etam',
        	'logo' => '',
            'description' => $desc,
            'title' => 'Habar.co',
        	'meta_keyword' => 'berita, news, Kutai Kartanergara, samarinda, kaltim, kalimantan timur, borneo, balikpapan, ',
        	'meta_description' => 'Portal berita dan informasi mengenai Kalimantan Timur.',
        	'facebook' => 'https://www.facebook.com',
        	'twitter' => 'https://www.twitter.com',
            'google-plus' => 'https://plus.google.com',
            'instagram' => 'https://www.instagram.com/',
        	'google_analytics'=>'',
        	'maintenance' => 0,
            'contact-us' => $contact,
            'terima-email' => $getmail,
            'news-feed-home' => 15,
            'footer-kategori'=> $footer_kategori,
            'homepage' => $homepage,
            'category' => $category,
            'single' => $single,
            'kecamatan' => $kecamatan,
            'widget-social' => $widget_social,
            'widget-news' =>$widget_news,
            'widget-kecamatan' => $widget_kecamatan,
            'widget-lifestyle' => $widget_lifestyle,
            'ads-930' => $widget_ads_930,
            'ads-250' => $widget_ads_250,
            'ads-300' => $widget_ads_300,
            'widget-list-populer' => $widget_list_populer,
            'widget-tab-news' => $widget_tab_news,
            'widget-facebook' => $widget_facebook,
            'widget-photo-post' => $widget_photo_post,
            'widget-list-images-news' =>$widget_list_images_news
        ];

        foreach($settings as $key => $value){
        	App\Setting::create(['key'=>$key,'value'=>$value]);
        }
    }
}

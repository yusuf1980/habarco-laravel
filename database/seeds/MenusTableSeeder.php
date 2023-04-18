<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = ['Kecamatan','Nasional','Pemerintah','Ekonomi','Olahraga','entertainment','Pendidikan','Perundangan'];
        $url = ['kategori/kecamatan', 'kategori/nasional', 'kategori/pemerintah', 'kategori/ekonomi', 'kategori/olahraga', 'kategori/entertainment', 'kategori/pendidikan', 'kategori/perundangan'];
        $secondmenu = ['home','about us','contact us','disclaimer', 'privacy-policy','career'];
        $url2 = ['/', 'page/about-us', 'contact/contact-us', 'page/disclaimer', 'page/privacy-policy', 'page/career'];
        $jumlahmenu = count($menus);
        $jumlahsecond = count($secondmenu);

        $i = 0;
        $urut = 1;
        foreach ( range(1,$jumlahmenu) as $index ){
        	App\Menu::create(['title'=>$menus[$i],'parent_id'=>0,'url'=>$url[$i],'type'=>'top','order'=>$urut,'title_attr'=>$menus[$i],'format'=>'category']);
        	$i++;
            $urut ++;
        }
        $i2 = 0;
        $urut2 = 1;
        foreach( range(1, $jumlahsecond) as $index ) {
            App\Menu::create(['title'=>$secondmenu[$i2],'parent_id'=>0,'url'=>$url2[$i2],'type'=>'second','order'=>$urut2,'title_attr'=>$secondmenu[$i2],'format'=>'page']);
            $i2++;
            $urut2++;
        }
    }
}

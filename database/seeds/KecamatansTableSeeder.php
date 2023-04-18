<?php

use Illuminate\Database\Seeder;

class KecamatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$title = ['Kecamatan Anggana', 'Kecamatan Kembang Janggut', 'Kecamatan Kenohan', 'Kecamatan Kota Bangun', 'Kecamatan Loa Janan',
    	'Kecamatan Loa Kulu', 'Kecamatan Marang Kayu', 'Kecamatan Muara Badak', 'Kecamatan Muara Jawa', 'Kecamatan Muara Kaman',
    	'Kecamatan Muara Muntai', 'Kecamatan Muara wis', 'kecamatan samboja', 'kecamatan sanga sanga', 'kecamatan sebulu',
    	'kecamatan tabang', 'kecamatan tenggarong', 'kecamatan tenggarong seberang'];

    	$description = [
    		'Kecamatan Anggana merupakan salah satu kecamatan yang berada di wilayah Kabupaten Kutai Kartanegara, Kalimantan Timur. <br><br>Kecamatan berpenduduk 23.342 jiwa (2005) ini memiliki luas wilayah sekitar 1.798,80 km2. Wilayahnya terletak di muara Sungai Mahakam dan didominasi pulau-pulau kecil yang disebut Delta Mahakam. Salah satu daerah di Kecamatan Anggana yang bernama Kutai Lama merupakan pusat pemerintahan pertama Kerajaan Kutai Kartanegara selama 4 abad sejak berdiri pada abad ke-13 hingga abad ke-17 sebelum pindah ke Pemarangan. <br><br>Kecamatan Anggana merupakan daerah penghasil minyak bumi dan gas alam dengan beroperasinya lapangan migas milik perusahaan Total E&P Indonesie dan VICO Indonesia. Selain itu, masyarakat di daerah ini mengandalkan sektor perikanan dengan menggarap tambak-tambak udang di Delta Mahakam. Namun pembabatan hutan mangrove atau hutan bakau secara besar-besaran di Delta Mahakam untuk lahan tambak tersebut telah mengancam kelestarian lingkungan di wilayah ini.<br><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d313849.63475161203!2d117.27840861320215!3d-0.5935002257035494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df4372b8a7eb89f%3A0xa5806b8f13debeb!2sAnggana%2C+Kabupaten+Kutai+Kartanegara%2C+Kalimantan+Timur!5e1!3m2!1sid!2sid!4v1468007514635" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
    		'Kembang Janggut merupakan sebuah kecamatan yang terletak di wilayah pedalaman Kabupaten Kutai Kartanegara, Kalimantan Timur.<br><br>Kecamatan Kembang Janggut memiliki luas wilayah mencapai 1.923,9 km2 yang dibagi dalam 7 desa dengan jumlah penduduk mencapai 15.370 jiwa (2005).<br><br>Prasarana jalan yang memadai belum tersedia di wilayah ini, sehingga transportasi sungai masih menjadi andalan untuk menuju wilayah yang dibelah oleh Sungai Belayan (anak Sungai Mahakam) ini.<br><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d372894.6985189271!2d115.90590781025612!3d0.2241707073452489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320838d5c44f0783%3A0xafec5558581d30f9!2sKembang+Janggut%2C+Kabupaten+Kutai+Kartanegara%2C+Kalimantan+Timur!5e1!3m2!1sid!2sid!4v1468008584912" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
    		'Kenohan merupakan sebuah kecamatan yang terletak di wilayah pedalaman Kabupaten Kutai Kartanegara, Kalimantan Timur.<br><br>Kecamatan Kenohan terletak antara 115º57" BT – 116º33" BT dan 0º11" LS – 0º12" LS dengan luas wilayah mencapai 1.302,2 km2. Secara administratif, kecamatan ini terbagi dalam 8 desa dengan jumlah penduduk mencapai 10.300 jiwa (2005).<br><br>Wilayah kecamatan Kenohan dibelah oleh Sungai Belayan yang merupakan salah satu anak Sungai Mahakam. Kecamatan Kenohan juga terletak di tepi sebuah danau besar di Kutai Kartanegara yakni Danau Semayang. Pola penyebaran penduduk masyarakat kecamatan ini terkonsentrasi di sepanjang sungai dan danau tersebut.<br><br>Sektor perikanan, pertanian dan perkebunan masih menjadi andalan perekonomian masyarakat setempat. Disamping itu, peternakan ayam buras di kecamatan ini juga merupakan yang terbesar di Kabupaten Kutai Kartanegara yang mampu memproduksi puluhan ribu kilogram daging ayam maupun telur.<br><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d443534.77260783606!2d115.98044527442256!3d-0.016159977588367094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df7d7b94fe1ccbd%3A0x343162ce5c2204f1!2sKenohan%2C+Kabupaten+Kutai+Kartanegara%2C+Kalimantan+Timur!5e1!3m2!1sid!2sid!4v1468008666112" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
    	];
    	$info1 = serialize([
    		'Ibukota'=>'Desa Sungai Mariam',
    		'Camat'=>'Alamyah S.Sos',
    		'Luas'=>'179.80 km2',
    		'Penduduk'=>'47.338 jiwa',
    		'Kepadatan'=>'26 penduduk/km2',
    		'Desa'=>'8 Desa',
    		]);
    	$info2 = serialize([
    		'Ibukota'=>'Desa Kembang Janggut',
    		'Camat'=>'H.M. Zulkifli, SIP, M.Si',
    		'Luas'=>'1923.90 km2',
    		'Penduduk'=>'28.561 jiwa',
    		'Kepadatan'=>'15 penduduk/km2',
    		'Desa'=>'11 Desa'
    		]);
    	$info3 = serialize([
    		'Ibukota'=>'Desa Kahala',
    		'Camat'=>'Murjani, SP',
    		'Luas'=>'1302.20 km2',
    		'Penduduk'=>'12.948 jiwa',
    		'Kepadatan'=>'10 penduduk/km2',
    		'Desa'=>'8 Desa'
    		]);
    	$information = [$info1,$info2,$info3];
    	$image = ['Lokasi_anggana_kutai_kartanegara.jpg','Lokasi_kembangjanggut_kutai_kartanegara.jpg','Lokasi_kenohan_kutai_kartanegara.jpg'];
    	$kategori = 14;
    	$i = 0;
    	foreach(range(1,count($title)) as $index) {
    		if($i <= 2){
    			App\Kecamatan::create(['title'=>$title[$i], 'category_id'=>$kategori,'description'=>$description[$i],'information'=>$information[$i],'image'=>$image[$i]]);
    		}elseif($i > 2) {
    			App\Kecamatan::create(['title'=>$title[$i], 'category_id'=>$kategori]);
    		}
    		$kategori++;
    		$i++;
    	}
        
    }
}

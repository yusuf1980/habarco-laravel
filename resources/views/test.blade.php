<?php
		$settings = [
        	'sitename' => 'Wamet.com',
        	'slogan' => 'Warta Mahakam Etam',
        	'logo' => '',
        	'meta_keyword' => 'berita, news, Kutai Kartanergara, samarinda, kaltim',
        	'meta_description' => 'Portal berita dan informasi mengenai daerah tertinggal dan kawasan Kalimantan Timur dan Kutai Kartanegara.',
        ];

        foreach($settings as $key => $value){
        	echo 'key = '. $key. '. Nilai = '.$value.'.<br>';
        }
?>

<?php


?>
<br>
<?php 

$setting = App\Setting::where('key', 'homepage')->first();
$set = unserialize($setting->value);


//$side = $set['sidebar-left'];
//print_r(array_keys($set));
$side = ['baju', 'celana','kutang'];
echo '<br>';
print_r($set);
echo '<br><br>';
$baru = 'ads-930-2';
$res = [];
foreach($set as $s => $v) {
        //$sar = [];
        $var = [];
        if($s == 'sidebar-left'){
                echo $s.'=';
                $no = 1;
                foreach($side as $k => $ve){
                        //$var = [];
                        //if($no == 1){
                         //       echo 'ads-930-2,';
                        //}
                        
                        echo $ve.','; 
                        //$var = $ve;
                        $var[$k] = $ve;
                        $no++;
                }
        }else {
                echo '<br>';
                echo $s.'=';
                foreach($v as $k => $ve){
                        //$ver = [];
                        echo $ve.',';
                        //$ver = $ve;
                        $var[$k] = $ve;
                } 
        }
        
        $res[$s] = $var;
}
echo '<br>';
//print_r(serialize($res));
print_r($res);
echo '<br>';
$r = serialize($res);
//print_r($r);
echo '<br>';
$set = App\Setting::where('key', 'ads-930')->first();
$s = unserialize($set->value);
//$people=array("Peter","Joe","Glenn","Cleveland");
end($s);
echo "The key from the end position is: " . key($s);
//print_r($pu);
echo '<br>';
$array = array(
     1=>[123],
     2=>[456],
     5=>[789], 
);

end($array);         // move the internal pointer to the end of the array
$key = key($array) + 2;  // fetches the key of the element pointed to by the internal pointer

echo $key;



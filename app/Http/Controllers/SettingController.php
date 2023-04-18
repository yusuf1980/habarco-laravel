<?php

namespace App\Http\Controllers;

use Redirect;
use App\Setting;
use App\Banner;
use Validator;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{
    public function setHome()
    {
    	$sethome = Setting::where('key', 'homepage')->first();
        if (empty($sethome)) {
            abort(404);
        }
    	
        return view('back.settings.sethome', compact('sethome'));
    }

    public function setCategory()
    {
    	$setcategory = Setting::where('key', 'category')->first();
        if (empty($setcategory)) {
            abort(404);
        }
        return view('back.settings.setcategory', compact('setcategory'));
    }

    public function setSingle()
    {
    	$setsingle = Setting::where('key', 'single')->first();
        if (empty($setsingle)) {
            abort(404);
        }
        return view('back.settings.setsingle', compact('setsingle'));
    }

    public function setKecamatan()
    {
        $setkecamatan = Setting::where('key', 'kecamatan')->first();
        if (empty($setkecamatan)) {
            abort(404);
        }
        return view('back.settings.setkecamatan', compact('setkecamatan'));
    }

    // Autocomplete for ads
    public function search(Request $request)
    {
        $term = trim($request->input('term'));
        $banners = Banner::where('title', 'LIKE', '%'.$term.'%')->take(10)->get();
        $response = array();
        foreach($banners as $banner){
            $var = [];
            $var['value'] = $banner->title;
            $var['id'] = $banner->id;
            $response[] = $var;
        }

        return response()->json($response);
    }

    // Autocomplete for category search
    public function categorySearch(Request $request)
    {
        $term = trim($request->input('term'));
        $banners = Category::where('title', 'LIKE', '%'.$term.'%')->take(10)->get();
        $response = array();
        foreach($banners as $banner){
            $var = [];
            $var['value'] = $banner->title;
            $var['id'] = $banner->id;
            $response[] = $var;
        }

        return response()->json($response);
    }

    public function saveWidget(Request $request)
    {
        if($request->ajax()){
            $column = $request->input('column');
            $key = $request->input('key');
            $page = $request->input('page');
            $widgets = Setting::where('key', $key)->first();
            $set = unserialize($widgets->value);
            // Panggil fungsi inputWidget()
            // Untuk mengisi data awal
            $push = $this->inputWidget($key);

            // Ambil posisi array terakhir dan tambahkan 1
            end($set);
            $nextNumber = key($set) + 1;
            // Tambahkan ke dalam array $set
            $set[$nextNumber] = $push;
            
            foreach($set as $k => &$v){
                $res[$k] = $v;
            }
            $serialWidget = serialize($res);
            $wid['value'] = $serialWidget;
            $widgets->update($wid);

            $sidebar = Setting::where('key', $page)->first();
            $setbar = unserialize($sidebar->value);
            $all = $setbar[$column];
            
            $pushWidget = $key.'-'.$nextNumber;
            array_push($all, $pushWidget);
            $col = [];
            foreach($setbar as $ks => $vs){
                $widget = [];
                if($ks == $column){
                    foreach($all as $kw => $va){
                        $widget[$kw] = $va;
                    }
                }elseif($ks != $column) {
                    foreach ($vs as $kw => $va) {
                        $widget[$kw] = $va;
                    }
                }
                $col[$ks] = $widget;
            }
            
            $serial = serialize($col);
            $input['value'] = $serial;
            $sidebar->update($input);
            
            $response = ['result'=>'success', 'id' => $pushWidget];
            //$response = ['result'=>$res];
        }

        return response()->json($response);
    }

    public function changePlace(Request $request)
    {
        if($request->ajax()){
            $column = $request->input('column');
            $id = $request->input('id');
            $allwidgetnew = $request->input('all');
            $start = $request->input('start');
            $allstart = $request->input('allstart');
            $page = $request->input('page');
            
            $setting = Setting::where('key', $page)->first();
            $set = unserialize($setting->value);
            $side = $set[$start];

            $col = [];
            foreach($set as $s => $v){
                $widget = [];
                if($s == $start){
                    if(count($allstart) > 0){
                        foreach($allstart as $k => $va){
                            $widget[$k] = $va;
                        }
                    }
                }elseif($s == $column){
                    foreach($allwidgetnew as $k => $va){
                        $widget[$k] = $va;
                    }
                }elseif($s !== $start || $s !== $column) {
                    foreach ($v as $k => $va) {
                        $widget[$k] = $va;
                    }
                }
                $col[$s] = $widget;
            }
            
            $serial = serialize($col);
            $input['value'] = $serial;
            $setting->update($input);

            $response = ['result'=>'success'];

            return response()->json($response);
        }
    }

    public function changeNumber(Request $request)
    {
        if($request->ajax()){
            $column = $request->input('column');
            $allwidgetnew = $request->input('all');
            $page = $request->input('page');
            
            $setting = Setting::where('key', $page)->first();
            $set = unserialize($setting->value);

            $col = [];
            foreach($set as $s => $v){
                $widget = [];
                if($s == $column){
                    foreach($allwidgetnew as $k => $va){
                        $widget[$k] = $va;
                    }
                }elseif($s !== $column) {
                    foreach ($v as $k => $va) {
                        $widget[$k] = $va;
                    }
                }
                $col[$s] = $widget;
            }
            
            $serial = serialize($col);
            $input['value'] = $serial;
            $setting->update($input);

            $response = ['result'=>'success','con'=>$column];

            return response()->json($response);
        }
    }

    public function deleteWidget(Request $request)
    {
        if($request->ajax()){
            $column = $request->input('column');
            $all = $request->input('all');
            $key = $request->input('widgetid');
            $page = $request->input('page');
            $sidebar = Setting::where('key', $page)->first();
            $setbar = unserialize($sidebar->value);
            if($all == null || $all == ''){
                $all = [];
            }
            $col = [];
            foreach($setbar as $ks => $vs){
                $widget = [];
                if($ks == $column){
                    foreach($all as $kw => $va){
                        $widget[$kw] = $va;
                    }
                }elseif($ks != $column) {
                    foreach ($vs as $kw => $va) {
                        $widget[$kw] = $va;
                    }
                }
                $col[$ks] = $widget;
            }
            
            $serial = serialize($col);
            $input['value'] = $serial;
            $sidebar->update($input);

            $d = strrpos($key, '-');
            $frontWord = substr($key, 0, $d);
            $h = strrpos($key, '-');
            $backWord= substr($key, $d+1);

            $widgets = Setting::where('key', $frontWord)->first();
            $set = unserialize($widgets->value);
            unset($set[$backWord]);
            
            foreach($set as $k => $v){
                $res[$k] = $v;
            }
            $serialWidget = serialize($res);
            $wid['value'] = $serialWidget;
            $widgets->update($wid);

            $response = ['result' => 'success'];
            return response()->json($response);
        }
    }

    public function saveAds(Request $request)
    {
        if($request->ajax()){
            if($request->has('data') && $request->has('selected')){
                $column = $request->input('column');
                $data = $request->input('data');
                $key = $request->input('key');
                $selected = $request->input('selected');

                $d = strrpos($key, '-');
                $frontWord = substr($key, 0, $d);
                $h = strrpos($key, '-');
                $backWord= substr($key, $d+1);

                if($selected == 'choose'){
                    $nilai = [];
                    foreach($data as $d => $va){
                        if($va['value'] !== ''){
                            $ve = $va['value'];
                            $nilai[] = $ve;
                        }
                    }
                    if(array_filter($nilai, function($value) { return $value !== ''; })){
                        $nilai = $nilai;
                    }else{
                        $response = ['result'=>'error'];
                        return response()->json($response);
                    }
                }elseif($selected == 'text'){
                    $nilai = $data;
                }
                
                $totalNilai = ['title'=>$frontWord, 'id'=>$nilai, 'format'=>$selected];
                $widgets = Setting::where('key', $frontWord)->first();
                $set = unserialize($widgets->value);
                    
                foreach($set as $k => $v){
                    if($k == $backWord){
                        $v = $totalNilai;
                    }else {
                        $v = $v;
                    }
                    $res[$k] = $v;
                }
                $serialWidget = serialize($res);
                $wid['value'] = $serialWidget;
                $widgets->update($wid);

                $response = ['result'=>'success'];
                
            }else {
                $response = ['result'=>'error'];
            }

            return response()->json($response);
        }
    }

    public function saveCat(Request $request)
    {
        if($request->input('cat') == 'facebook'){
            $validator = Validator::make($request->all(), [
                'column' => 'required',
                'key' => 'required'
            ]);
        }else {
            $validator = Validator::make($request->all(), [
                'column' => 'required',
                'data' => 'numeric',
                'count' => 'required|numeric',
                'key' => 'required'
            ]);
        }
        if($validator->fails()){
            $response = array(
                'status' => 'error',
                'message' => $validator->errors()->all(),
            );
        }
        else if($request->ajax()){
            $column = $request->input('column');
            $data = $request->input('data');
            $key = $request->input('key');
            $title = $request->input('title');
            $count = $request->input('count');

            $d = strrpos($key, '-');
            $frontWord = substr($key, 0, $d);
            $h = strrpos($key, '-');
            $backWord= substr($key, $d+1);
            if($frontWord == 'widget-list-populer'){
                $totalNilai = ['title'=>$title, 'count'=>$count];
            }elseif($frontWord == 'widget-facebook'){
                $totalNilai = ['title'=>'', 'id'=>$data];
            }else{
                $totalNilai = ['title'=>$title, 'id'=>$data, 'count'=>$count];
            }

            $widgets = Setting::where('key', $frontWord)->first();
            $set = unserialize($widgets->value);
                    
            foreach($set as $k => $v){
                if($k == $backWord){
                    $v = $totalNilai;
                }else {
                    $v = $v;
                }
                $res[$k] = $v;
            }
            $serialWidget = serialize($res);
            $wid['value'] = $serialWidget;
            $widgets->update($wid);

            $response = ['status'=>'success']; 
        }

        return response()->json($response);
    }

    // memilih input yang diisi ke fungsi widget masing-masing
    private function inputWidget($widget)
    {
        if($widget == 'ads-930' || $widget == 'ads-250' || $widget == 'ads-300') {
            $inputWidget = $this->widgetAds($widget);
        }elseif($widget == 'widget-social') {
            $inputWidget = $this->widgetSocial($widget);
        }elseif($widget == 'widget-news' || $widget == 'widget-lifestyle' || $widget == 'widget-photo-post' || $widget == 'widget-tab-news') {
            $inputWidget = $this->widgetCategory($widget);
        }elseif($widget == 'widget-kecamatan'){
            $inputWidget = $this->widgetKecamatan($widget);
        }elseif($widget == 'widget-list-populer' || $widget == 'widget-list-images-news'){
            $inputWidget = $this->widgetListPopuler($widget);
        }elseif($widget == 'widget-facebook'){
            $inputWidget = $this->widgetFacebook($widget);
        }

        return $inputWidget;
    }

    private function widgetAds($widget)
    {
        $input = [];
        $input['title'] = $widget;
        $input['format'] = 'text';
        $input['id'] = '';
        return $input;
    }
    private function widgetSocial($widget)
    {
        $input = [];
        $input['title'] = '';
        return $input;
    }
    private function widgetCategory($widget)
    {
        $input = [];
        $input['title'] = '';
        $input['id'] = '';
        $input['count'] = '';
        return $input;
    }
    private function widgetKecamatan($widget)
    {
        $input = [];
        $input['title'] = 'Kecamatan';
        $input['id'] = 1;
        return $input;
    }
    private function widgetListPopuler($widget)
    {
        $input = [];
        $input['title'] = '';
        $input['count'] = 10;
        return $input;
    }
    private function widgetFacebook($widget)
    {
        $input = [];
        $input['title'] = '';
        $input['id'] = '';
        return $input;
    }
}

<?php

namespace App\Http\Controllers;

use Redirect;
use App\Setting;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class SetGlobalController extends Controller
{
    public function setGlobal()
    {
    	$settings = Setting::all();
        return view('back.settings.setglobal', compact('settings'));
    }

    public function saveGlobal(Request $request)
    {
        $input = $request->all();
        $i = 0;
        foreach($input as $key => $value){
        	if($i > 0){
        		$set = Setting::where('key', $key)->first();
	        	$inp['value'] = $value;
	        	$set->update($inp);
        	}
        	$i++;
        }

        flash()->success('Anda berhasil memperbarui Pengaturan Umum.');

        return Redirect::back();
    }

    public function saveContact(Request $request)
    {
        $input = $request->all();
        $setting = Setting::where('key', 'contact-us')->first();
        if (empty($setting)) {
            abort(404);
        }
        $res = array();
        $i = 0;
        foreach($input as $key => $value){
        	if($i > 0){
        		$res[$key] = $value;
        	}
        	$i++;
        }
        $serial['value'] = serialize($res);
        $setting->update($serial);
        
        flash()->success('Anda berhasil memperbarui Pengaturan Kontak dan Alamat.');

        return Redirect::back();
    }

    public function saveEmail(Request $request)
    {
        $serialize = [1 => $request->input('email1'), 2=>$request->input('email2'), 3=>$request->input('email3')];
        $setting = Setting::where('key', 'terima-email')->first();
        if (empty($setting)) {
            abort(404);
        }
        $serial['value'] = serialize($serialize);
        $setting->update($serial);
        
        flash()->success('Anda berhasil memperbarui Pengaturan Peneerima Email.');

        return Redirect::back();
    }

    public function saveFooter(Request $request)
    {
        $serialize = [
        	'kategori-1' => ['name' => $request->input('name1'), 'id'=>$request->input('id1')], 
        	'kategori-2' => ['name' => $request->input('name2'), 'id'=>$request->input('id2')], 
        ];
        $setting = Setting::where('key', 'footer-kategori')->first();
        if (empty($setting)) {
            abort(404);
        }
        $serial['value'] = serialize($serialize);
        $setting->update($serial);

        flash()->success('Anda berhasil memperbarui Pengaturan Footer.');

        return Redirect::back();
    }
}

<?php

namespace App\Http\Controllers;

use File;
use Redirect;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use App\Http\Requests;

class BannerController extends Controller
{
    private $size = [[140, 140]];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::withDrafts()->get();
        return view('back.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset($_COOKIE['samweb'])){
            $coki = $_COOKIE['samweb'];
        }else {
            $coki = '';
        }
        return view('back.banners.create', compact('coki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:3|max:150|unique:banners,title',
            'suspended' => 'boolean',
            'gambar' => 'mimes:gif,jpeg,jpg,png|max:5000'
        ]);

        $input['published'] = $request->input('suspended');
        $input['title'] = $request->input('judul');
        $input['name'] = $request->input('name');
        $input['instansi'] = $request->input('instansi');
        $input['url'] = $request->input('link');
        $input['description'] = $request->input('deskripsi');
        $input['startdate'] = $request->input('startdate').' '.$request->input('starttime');
        $input['enddate'] = $request->input('lastdate').' '.$request->input('lasttime');
        $input['user_id'] = Auth::user()->id;

        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            // tambah dan resize gambar, melalui fungsi addImage()
            $name = $this->addImage($image);
                
            $input['image'] = $name;
        }
        
        Banner::create($input);

        flash()->success('Anda berhasil menambahkan Iklan baru.');

        return Redirect::route('banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::withDrafts()->whereId($id)->first();
        if (empty($banner)) {
            abort(404);
        }
        return view('back.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('gambar')){
            $this->validate($request, [
                'judul' => 'required|min:3|max:150',
                'published' => 'boolean',
                'gambar' => 'mimes:gif,jpeg,jpg,png|max:5000'
            ]);
        }else{
            $this->validate($request, [
                'judul' => 'required|min:3|max:150',
                'published' => 'boolean',
            ]);
        }

        $banner = Banner::withDrafts()->whereId($id)->first();
        if (empty($banner)) {
            abort(404);
        }

        $input['published'] = $request->input('published');
        $input['title'] = $request->input('judul');
        $input['name'] = $request->input('name');
        $input['instansi'] = $request->input('instansi');
        $input['url'] = $request->input('link');
        $input['description'] = $request->input('deskripsi');
        $input['startdate'] = $request->input('startdate').' '.$request->input('starttime');
        $input['enddate'] = $request->input('lastdate').' '.$request->input('lasttime');

        if($request->hasFile('gambar')){
            if($banner->image != '' || $banner->image != null){
                $this->delImage($banner);
            }
            $image = $request->file('gambar');
            // tambah dan resize gambar, melalui fungsi addImage()
            $name = $this->addImage($image);
                
            $input['image'] = $name;
        }else{
            if ($request->has('gambarbefore')) {}
            elseif($banner->image != '' || $banner->image != null){
                $this->delImage($banner);
                $input['image'] = null;
            }else{}
        }

        $banner->update($input);

        flash()->success('Anda telah mengedit Iklan.');

        return Redirect::route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::withDrafts()->whereId($id)->first();
        if(!empty($banner->image) || $banner->image != null){
            $this->delImage($banner);
        }
        $banner->delete();

        flash()->warning('Anda telah menghapus Iklan '.$banner->title);

        return Redirect::route('banners.index');
    }

    public function search(Request $request)
    {
    	$this->validate($request, [
            's' => 'required|min:2|max:150'
        ]);

        $search = $request->input('s');

        $banners = Banner::where('title', 'like', '%'.$search.'%')->paginate(20);

        return view('back.banners.index', compact('banners'));
    }

    private function delImage(Banner $banner) 
    {
        $destination = ['img/banner/thumbnail/'.$banner->image, 'img/banner/'.$banner->image];

        for($i=0;$i<=1;$i++){
            File::delete($destination[$i]);
        }
    }

    private function addImage($image)
    {
        //$extension = pathinfo($image, PATHINFO_EXTENSION);
        $extension = $image->getClientOriginalExtension();
        $name = rand(1111111111,9999999999).'.'.$extension;

        $destination = 'img/banner/';
        $image->move($destination, $name);
        $image_final = $destination. '/' .$name;
                     
        for($i=0;$i<=0;$i++){
            $img = Image::make($image_final);

            // mengambil array ukuran dari properti $size
            $s = $this->size[$i];

            $img->fit($s[0], $s[1]);

            $destination = 'img/banner/thumbnail/'.$name;

            $img->save($destination);
        }

        return $name; 
    }
}

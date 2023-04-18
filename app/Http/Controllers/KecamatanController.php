<?php

namespace App\Http\Controllers;

use File;
use Redirect;
use App\Kecamatan;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Http\Requests;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::with('category')->get();
        return view('back.kecamatan.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id', 1)->get();

        if(isset($_COOKIE['samweb'])){
            $coki = $_COOKIE['samweb'];
        }else {
            $coki = '';
        }

        return view('back.kecamatan.create', compact('coki', 'category'));
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
            'judul' => 'required|min:3|max:150|unique:kecamatans,title',
            'category' => 'required|unique:kecamatans,category_id'
        ]);
        $input['title'] = $request->input('judul');
        $description = trim($request->input('deskripsi'));
        $input['description'] = $description;
        $input['category_id'] = $request->input('category');
        $info = $request->input('info');
        $nilai = $request->input('nilai');
        for($i=0;$i<=count($info)-1;$i++){
            $inf = $info[$i];
            $res[$inf] = $nilai[$i];
        }
        
        $input['information'] = serialize($res);
        if($request->has('image')){
            if($request->input('image') != '' || $request->input('image') != null){
                $image = $request->input('image');
                // tambah dan resize gambar, melalui fungsi addImage()
                $name = $this->addImage($image);
                    
                $input['image'] = $name;
            }
        }
        
        Kecamatan::create($input);

        flash()->success('Anda berhasil menambahkan Info Kecamatan baru.');
        
        return Redirect::route('kecamatans.index');
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
        $kecamatan = Kecamatan::find($id);
        if (empty($kecamatan)) {
            abort(404);
        }
        $category = Category::where('parent_id', 1)->get();

        if(isset($_COOKIE['samweb'])){
            $coki = $_COOKIE['samweb'];
        }else {
            $coki = '';
        }
        return view('back.kecamatan.edit', compact('kecamatan', 'coki', 'category'));
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
        $kecamatan = Kecamatan::find($id);
        if (empty($kecamatan)) {
            abort(404);
        }
        $this->validate($request, [
            'judul' => 'required|min:3|max:150|unique:kecamatans,title,'.$kecamatan->id,
            'category' => 'required|unique:kecamatans,category_id,'.$kecamatan->id,
        ]);
        $input['title'] = $request->input('judul');
        $description = trim($request->input('deskripsi'));
        $input['description'] = $description;
        $input['category_id'] = $request->input('category');
        if($request->has('info')){
            $info = $request->input('info');
            $nilai = $request->input('nilai');
            for($i=0;$i<=count($info)-1;$i++){
                $inf = $info[$i];
                $res[$inf] = $nilai[$i];
            }
            $input['information'] = serialize($res);
        }else{
            $input['information'] = null;
        }
        

        $image = $request->input('image');
        if($kecamatan->image != '' || $kecamatan->image != null) {

            if($image != '') {
                $baseimage  = pathinfo($image, PATHINFO_BASENAME);

                if($baseimage != $kecamatan->image){
                    // Hapus gambar, melalui fungsi delImage()
                    $this->delImage($kecamatan);
                    // Tambahkan gambar, melalui fungsi addImage()
                    $name = $this->addImage($image);
                    $saveimage = $name;
                }else {
                    $saveimage = pathinfo($image, PATHINFO_BASENAME);
                }
                
            }elseif($image == '') {
                $this->delImage($kecamatan);
                $saveimage = null;
            }

        }else {
            if($image != '') {
                $name = $this->addImage($image);
                $saveimage = $name;
            }else {
                $saveimage = null;
            }

        }
        $input['image'] = $saveimage;

        $kecamatan->update($input);

        flash()->success('Anda berhasil mengedit Info Kecamatan.');

        return Redirect::route('kecamatans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        if (empty($kecamatan)) {
            abort(404);
        }
        $title = $kecamatan->title;

        if($kecamatan->image != '' || $kecamatan->image != null){
            $this->delImage($kecamatan);
        }

        $kecamatan->delete();

        flash()->warning('Anda telah menghapus Info Kecamatan: '.$title); 

        return Redirect::route('kecamatans.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            's' => 'required|min:2|max:150'
        ]);

        $search = $request->input('s');

        $kecamatans = Kecamatan::where('title', 'like', '%'.$search.'%')->paginate(20);

        return view('back.kecamatan.index', compact('kecamatans'));
    }

    private function addImage($image)
    {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $name = rand(1111111111,9999999999).'.'.$extension;
        $img = Image::make($image);
        $img->fit(250, 362);
        $destination = 'image/kabupaten/'.$name;
        $img->save($destination);
        
        return $name; 
    }

    private function delImage(Kecamatan $kecamatan) 
    {
        $destination = 'image/kabupaten/'.$kecamatan->image;

        File::delete($destination);
    }
}

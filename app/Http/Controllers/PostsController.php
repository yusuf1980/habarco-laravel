<?php

namespace App\Http\Controllers;

use File;
use Gate;
use Redirect;
use App\Post;
use App\Label;
use Validator;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use App\Http\Requests;

class PostsController extends Controller
{
    private $size = [[50, 50], [80, 80], [140, 140], [250, 210], [380, 210], [420, 210]];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('editor')) {
            $posts = Post::withDrafts()->with('category','user','label')->orderBy('id', 'desc')->paginate(20);
        }
        elseif(Gate::allows('author')) {
            $posts = Post::withDrafts()->with('category','user','label')->orderBy('id', 'desc')->where('user_id', $user->id)->paginate(20);
        }else {
            $posts = Post::withDrafts()->with('category','user','label')->orderBy('id', 'desc')->where('user_id', $user->id)->where('published', 0)->paginate(20);
        }
        
        return view('back.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childs','parent','childs.childs','childs.childs.childs')->orderBy('title', 'asc')->get();
        $labels = Label::orderBy('title', 'asc')->get();
        
        if(isset($_COOKIE['samweb'])){
            $coki = $_COOKIE['samweb'];
        }else {
            $coki = '';
        }
        return view('back.posts.create', compact('categories', 'labels', 'coki'));
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
            'judul' => 'required|min:3|max:150|unique:posts,title',
            'publish' => 'boolean'
        ]);
       
        $title = trim(strip_tags($request->input('judul')));
        $input['title'] = $title;
        $input['slug'] = $title;
        $description = trim($request->input('deskripsi'));
        $input['description'] = $description;
        
        if(Gate::allows('author')){
            $input['meta_description'] = $request->input('metadescription');
            $input['meta_keyword'] = $request->input('metakeyword');
            $input['published'] = $request->input('publish');
            if($request->has('headnews')){
                $input['headnews'] = 1;
            }
            if($request->has('breaking')){
                $input['breaking'] = 1;
            }
            if($request->has('image')){
                $image = $request->input('image');
                // tambah dan resize gambar, melalui fungsi addImage()
                $name = $this->addImage($image);
                
                $input['image'] = $name;
            }
        }
        else {
            $input['published'] = 0;
        }
        $input['user_id'] = Auth::user()->id;
        
        $post = Post::create($input);

        if(Gate::allows('author')){
            if($request->has('category')){
                $category = $request->input('category');
                $post->category()->attach($category);
            }
            if($request->has('label')){
                $label = $request->input('label');
                $post->label()->attach($label);
            }
        }

        flash()->success('Anda berhasil menambahkan Berita baru.');
        
        return Redirect::route('posts.index');
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
        
        $post = Post::withDrafts()->with('category','user','label')->whereId($id)->first();
        if (empty($post)) {
            abort(404);
        }
        $this->authorize('mypost', $post);
        $categories = Category::whereNull('parent_id')->with('childs','parent','childs.childs','childs.childs.childs')->orderBy('title', 'asc')->get();
        $labels = Label::orderBy('title', 'asc')->get();
            
        if(isset($_COOKIE['samweb'])){
            $coki = $_COOKIE['samweb'];
        }else {
            $coki = '';
        }

        return view('back.posts.edit', compact('post','categories', 'labels', 'coki'));
    }

    private function delImage(Post $post) 
    {
        for($i=0;$i<=5;$i++) {

            // mengambil array ukuran dari properti $size
            $s = $this->size[$i];

            $destination = 'img/news/'.$s[0].'x'.$s[1].'/'.$post->image;

            File::delete($destination);
        }
    }

    private function addImage($image)
    {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $name = rand(1111111111,9999999999).'.'.$extension;
        //dd($image);                  
        for($i=0;$i<=5;$i++){
            $img = Image::make($image);

            // mengambil array ukuran dari properti $size
            $s = $this->size[$i];

            $img->fit($s[0], $s[1]);

            $destination = 'img/news/'.$s[0].'x'.$s[1].'/'.$name;

            $img->save($destination);
        }

        return $name; 
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
        $post = Post::withDrafts()->whereId($id)->first();
        if (empty($post)) {
            abort(404);
        }
        $this->authorize('mypost', $post);
        $this->validate($request, [
            'judul' => 'required|min:3|max:150|unique:posts,title,'.$post->id,
            'publish' => 'boolean'
        ]);
        $title = trim(strip_tags($request->input('judul')));
        $input['title'] = $title;
        $input['slug'] = $title;
        $description = trim($request->input('deskripsi'));
        $input['description'] = $description;
        $input['meta_description'] = trim(strip_tags($request->input('metadescription')));
        $input['meta_keyword'] = trim(strip_tags($request->input('metakeyword')));
        $input['published'] = $request->input('publish');
        if($request->has('headnews')){
            $input['headnews'] = 1;
        }else {
            $input['headnews'] = 0;
        }
        if($request->has('breaking')){
            $input['breaking'] = 1;
        }else {
            $input['breaking'] = 0;
        }
        $image = $request->input('image');
        if($post->image != '' || $post->image != null) {

            if($image != '') {
                $baseimage  = pathinfo($image, PATHINFO_BASENAME);

                if($baseimage != $post->image){
                    // Hapus gambar, melalui fungsi delImage()
                    $this->delImage($post);
                    // Tambahkan gambar, melalui fungsi addImage()
                    $name = $this->addImage($image);
                    $saveimage = $name;
                }else {
                    $saveimage = pathinfo($image, PATHINFO_BASENAME);
                }
                
            }elseif($image == '') {
                $this->delImage($post);
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

        $post->update($input);

        if($request->has('category')){
            $category = $request->input('category');
            $post->category()->sync($category);
        }
        if($request->has('label')){
            $label = $request->input('label');
            $post->label()->sync($label);
        }

        flash()->success('Anda berhasil mengedit Berita.');

        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withDrafts()->whereId($id)->first();
        if (empty($post)) {
            abort(404);
        }
        $namepost = $post->title;
        $categories = $post->category;
        $labels = $post->label;
        $track = $post->stats;

        if($track != null){
            $track->delete();
        }
        
        foreach($categories as $category){
            $post->category()->detach($category->id);
        }
        foreach($labels as $label){
            $post->label()->detach($label->id);
        }

        $this->delImage($post);

        $post->delete();

        flash()->warning('Anda telah menghapus Berita: '.$namepost); 

        //flash()->warning('Maaf, untuk sementara Berita tidak dapat dihapus. ');

        return Redirect::route('posts.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            's' => 'required|min:3|max:150'
        ]);

        $search = $request->input('s');

        /*$search = strip_tags(trim($s));
        $search = str_replace('-', ' ', $search);

        $highlight = explode(' ', $search);

        $posts = Post::with('user')->whereRaw('MATCH(title,description) AGAINST(? IN BOOLEAN MODE)', array($search))->paginate(10);*/

        $posts = Post::with('category','user','label')->where('title', 'like', '%'.$search.'%')->paginate(20);

        return view('back.posts.index', compact('posts'));
    }

    public function ajaxcategory(Request $request)
    {
        $this->authorize('editor');
        $validator = Validator::make($request->all(), [
            'category' => 'required|min:3|max:50',
            'parent' => 'numeric',
            ]);

        if($validator->fails()){
            $response = array(
                'status' => 'error',
                'message' => $validator->errors()->all(),
            );
        }
        elseif($request->ajax()){
            $input['title'] = $request->input('category');
            $input['slug'] = $request->input('category');
            $input['parent_id'] = $request->input('parent');
            $category = Category::create($input);

            $response = ['status'=>'success','id'=>$category->id,'name'=>$category->title];
        }
        
        return response()->json($response);
    }

    public function ajaxlabel(Request $request)
    {
        $this->authorize('editor');
        $validator = Validator::make($request->all(), [
            'label' => 'required|min:3|max:50',
            ]);

        if($validator->fails()){
            $response = array(
                'status' => 'error',
                'message' => $validator->errors()->all(),
            );
        }
        elseif($request->ajax()){
            $input['title'] = $request->input('label');
            $input['slug'] = $request->input('label');
            $label = Label::create($input);

            $response = ['status'=>'success','id'=>$label->id,'name'=>$label->title];
        }
        
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use App\Page;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::withDrafts()->paginate(20);
        return view('back.pages.index', compact('pages'));
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

        return view('back.pages.create', compact('coki'));
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
            'judul' => 'required|min:3|max:150|unique:pages,title',
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
        $input['user_id'] = Auth::user()->id;
        
        Page::create($input);

        flash()->success('Anda berhasil menambahkan Halaman baru.');
        
        return Redirect::route('pages.index');
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
        $page = Page::withDrafts()->whereId($id)->first();
        if(!$page){
            return abort(404);
        }
        if(isset($_COOKIE['samweb'])){
            $coki = $_COOKIE['samweb'];
        }else {
            $coki = '';
        }
        return view('back.pages.edit', compact('page', 'coki'));
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
        $page = Page::find($id);
        $page = Page::withDrafts()->whereId($id)->first();
        if(!$page){
            return abort(404);
        }
        $this->validate($request, [
            'judul' => 'required|min:3|max:150|unique:pages,title,'.$page->id,
            'publish' => 'boolean'
        ]);
        $input['title'] = $request->input('judul');
        $input['slug'] = $request->input('judul');
        $input['description'] = $request->input('deskripsi');
        $input['meta_description'] = $request->input('metadescription');
        $input['meta_keyword'] = $request->input('metakeyword');
        $input['published'] = $request->input('publish');
        $input['user_id'] = Auth::user()->id;
        
        $page->update($input);

        flash()->success('Anda berhasil mengedit Halaman.');
        
        return Redirect::route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::withDrafts()->whereId($id)->first();
        $page->delete();

        flash()->warning('Anda telah menghapus Halaman '.$page->title);

        return Redirect::route('pages.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            's' => 'required|min:3|max:150'
        ]);

        $search = $request->input('s');

        $pages = Page::withDrafts()->with('user')->where('title', 'like', '%'.$search.'%')->paginate(20);

        return view('back.pages.index', compact('pages'));
    }
}

<?php

namespace App\Http\Controllers;

use Redirect;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('childs','parent','childs.childs','childs.childs.childs')->orderBy('title', 'asc')->get();

        return view('back.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
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
            'nama' => 'required|min:3|max:255',
            'kategori' => 'numeric',
            'deskripsi' => 'max:1000'
        ]);
        
        $input['title'] = $request->input('nama');
        $input['slug'] = $request->input('nama');
        $input['description'] = $request->input('deskripsi');
        $input['color'] = $request->get('color');
        $parent_id = $request->input('kategori');
        if($parent_id != '') {
            $parent = Category::findOrFail($parent_id);
        }else {
            $input['parent_id'] = null;
        }

        $category = Category::create($input);

        if($parent_id != '') {
            $parent->childs()->save($category);
        }

        flash()->success('Anda berhasil menambahkan Kategori baru.');

        return Redirect::route('category.index');
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
        $category = Category::find($id);
        if (empty($category)) {
            abort(404);
        }
        
        $categories = Category::with('childs','parent','childs.childs','childs.childs.childs')->orderBy('title', 'asc')->get();

        return view('back.categories.edit', compact('category', 'categories'));
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
        $this->validate($request, [
            'nama' => 'required|min:3|max:255',
            'kategori' => 'numeric',
            'deskripsi' => 'max:1000'
        ]);
        
        $input['title'] = $request->input('nama');
        $input['slug'] = $request->input('nama');
        $input['description'] = $request->input('deskripsi');
        $input['color'] = $request->get('color');
        $parent_id = $request->input('kategori');
        
        if($parent_id != '' || $parent_id != null) {
            $parent = Category::findOrFail($parent_id);
        }
        else{
            $input['parent_id'] = null;
        }
        $category1 = Category::find($id);
        if($parent_id != '' && $category1->parent_id != $parent_id) {

            $categoryChild = Category::whereId($id)->has('childs', 0)->first();
            
            if($categoryChild != null) {
                $categoryChild->update($input);

                if($parent_id != '') {
                    $parent->childs()->save($categoryChild);
                }

                flash()->success('Anda telah mengedit Kategori '.$categoryChild->title);

                return Redirect::route('category.index');
            }
            else {
                flash()->warning('Induk kategori ini tidak dapat diubah karena memiliki anak kategori!');

                return Redirect::route('category.index');
            }
        }
        else {
            $category = Category::find($id);

            if($category->count() != 0 ){
                $category->update($input);

                if($parent_id != '') {
                    $parent->childs()->save($category);
                }

                flash()->success('Anda telah mengedit Kategori '.$category->title);
            }
        }

        return Redirect::route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (empty($category)) {
            abort(404);
        }
        if($category != null && $category->id != 1) {
            $category->delete();

            flash()->warning('Kategori telah dihapus.');

        }else {
            flash()->warning('Kategori ini tidak dapat dihapus!');
        }

        return Redirect::route('category.index');
    }
}

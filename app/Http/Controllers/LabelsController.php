<?php

namespace App\Http\Controllers;

use Redirect;
use App\Label;
use Illuminate\Http\Request;

use App\Http\Requests;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::orderBy('title', 'asc')->get();
        $labelpage = Label::orderBy('title', 'asc')->paginate(20);
        return view('back.labels.index', compact('labels', 'labelpage'));
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
            'deskripsi' => 'max:1000'
        ]);
        $input['title'] = $request->input('nama');
        $input['slug'] = $request->input('nama');
        $input['description'] = $request->input('deskripsi');

        $label = Label::create($input);

        flash()->success('Anda berhasil menambahkan Label baru.');

        return Redirect::route('labels.index');
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
        $label = Label::find($id);
        if (empty($label)) {
            abort(404);
        }
        return view('back.labels.edit', compact('label'));
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
            'deskripsi' => 'max:1000'
        ]);
        $input['title'] = $request->input('nama');
        $input['slug'] = $request->input('nama');
        $input['description'] = $request->input('deskripsi');

        $label = Label::find($id);
        if (empty($label)) {
            abort(404);
        }
        $label->update($input);

        flash()->success('Anda berhasil mengedit Label '.$label->title);

        return Redirect::route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $label = Label::find($id); 
        if (empty($label)) {
            abort(404);
        }
        $label->delete();

        flash()->warning('Anda telah menghapus Label.');

        return Redirect::route('labels.index');
    }
}

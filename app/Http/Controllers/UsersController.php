<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $this->authorize('administrator', $user);
        $users = User::paginate(10);
        return view('back.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $this->authorize('administrator', $user);
        return view('back.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = Auth::user();
        $this->authorize('administrator', $u);
        $this->validate($request, [
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'suspended' => 'required|boolean',
            'role' => 'in:contributor,author,editor,administrator',
        ]);
        $input = $request->all();
        $input['name'] = $input['nama'];
        $input['password'] = bcrypt($input['password']);
        $user = User::create( $input );

        flash()->success('Anda berhasil menambahkan user baru.');

        return Redirect::route('users.index');
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
        $userid = User::findOrFail($id);
        if (!$userid) {
            abort(404);
        }
        $this->authorize('myuser', $userid);
        $user = $userid;
        return view('back.users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $userid = $user;
        if (!$userid) {
            abort(404);
        }
        $this->authorize('myuser', $userid);

        if(Gate::allows('administrator')) {
            $this->validate($request, [
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'suspended' => 'required|boolean',
            'role' => 'in:contributor,author,editor,administrator',
            ]);
            $input['suspended'] = $request->input('suspended');
            $input['role'] = $request->input('role');
        }else {
            $this->validate($request, [
                'nama' => 'required|min:3|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$user->id
            ]);
        }
        
        $input['name'] = $request->input('nama');
        $input['email'] = $request->input('email');
        
        $user->update($input);

        flash()->success('Anda berhasil mengedit user '.$user->name.'.');

        if(Gate::allows('administrator')) {
            return Redirect::route('users.index');
        }else {
            return Redirect::route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$u = Auth::user();
        $this->authorize('administrator');

        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        $user->delete();

        flash()->warning('User telah dihapus.');
        
        return Redirect::route('users.index');
    }

    public function banned($id)
    {
        $u = Auth::user();
        $this->authorize('administrator', $u);

        $user = User::find($id);
        if (!$user) {
            abort(404);
        }
        if($user->suspended == 0){
            $user->suspended = 1;
            $user->save();
            flash()->warning('Pengguna '.$user->name.' telah di-suspended.');
        }elseif($user->suspended == 1){
            $user->suspended = 0;
            $user->save();
            flash()->success('Pengguna '.$user->name.' telah diaktifkan kembali.');
        }
        

        return Redirect::back();
    }

    public function changepassword($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            abort(404);
        }
        $userid = $user;
        $this->authorize('myuser', $userid);
        return view('back.users.change-password', compact('user'));
    }

    public function updatepassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $input  = $request->all();
        
        $input['password'] = bcrypt($input['password']);

        $user      = User::find($id);
        if (!$user) {
            abort(404);
        }
        $userid = $user;
        $this->authorize('myuser', $userid);

        $user->update($input);

        flash()->success('Password '.$user->name.' berhasil diganti.');

        return Redirect::route('users.index');
    }

    public function search(Request $request)
    {
        $u = Auth::user();
        $this->authorize('administrator', $u);

        $this->validate($request, [
            's' => 'required|min:3|max:150'
        ]);

        $search = $request->input('s');

        $users = User::where('name', 'like', '%'.$search.'%')->paginate(10);

        return view('back.users.index', compact('users'));
    }
}

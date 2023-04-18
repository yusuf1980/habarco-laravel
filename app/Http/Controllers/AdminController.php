<?php

namespace App\Http\Controllers;

use Gate;
use Carbon\Carbon;
use App\Post;
use App\User;
use App\Banner;
use App\Contact;
use App\Functions\Popularity;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    	$this->validate($request, [
            'period' => 'in:one_day_stats,seven_days_stats,thirty_days_stats,all_time_stats',
        ]);
    	$publish = Post::withDrafts()->where('published', 1)->count();
    	$draft = Post::withDrafts()->where('published', 0)->count();
    	$countuser = User::count();
    	$countbanner = Banner::count();
    	$countcontact = Contact::where('status', 1)->count();
    	$posts = Post::withDrafts()->with('user')->orderBy('id', 'desc')->take(5)->get();
    	$banners = Banner::withDrafts()->orderBy('id', 'desc')->take(5)->get();
    	$contacts = Contact::orderBy('id', 'desc')->take(5)->get();

    	if($request->has('period')){
    		$period = $request->get('period');
    	}else {
    		$period = 'one_day_stats';
    	}
    	$popularity = new Popularity();
    	$item = $popularity->getStats($period, 'DESC', 'App\Post')->take(10)->get();
    	
    	return view('back.index', compact('publish','draft','countuser','countbanner','countcontact','posts','banners','contacts','item','period'));
    }

    public function saveDraft(Request $request)
    {
    	$this->validate($request, [
            'judul' => 'required|min:3|max:150|unique:posts,title',
        ]);
        $title = trim(strip_tags($request->input('judul')));
        $input['title'] = $title;
        $input['slug'] = $title;
        $description = trim($request->input('deskripsi'));
        $input['description'] = $description;
        $input['published'] = 0;
        $input['user_id'] = Auth::user()->id;
        Post::create($input);

    	flash()->success('Anda berhasil menambahkan Berita ke Draft.');
        
        return Redirect::route('dashboard');
    }

    public function documentation()
    {
    	return view('back.documentation');
    }
}

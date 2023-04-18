<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use App\Label;
use App\Contact;
use App\Setting;
use App\Category;
use App\Kecamatan;
use Redirect;
use View;
use Gate;
use Illuminate\Http\Request;
use App\Jobs\SendEmailContact;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$setnewsfeed = Setting::where('key', 'news-feed-home')->first();
        $sumnews = (int)$setnewsfeed->value;
        $headpost = Post::where('headnews', 1)->orderBy('id','desc')->take(6)->get();
        $posts = Post::with('category')->orderBy('id','desc')->paginate($sumnews);

        if ($request->ajax()) {
            return [
                'posts' => view('front.ajax', compact('posts'))->render(),
                'next_page' => $posts->nextPageUrl()
            ];
        }
        
    	return view('front.index', compact('headpost', 'posts'));
    }

    public function show($slug)
    {
    	$post = Post::with('label','category')->where('slug', $slug)->first();
        if (empty($post)) {
            abort(404);
        }
        $post->hit();

        $title = strip_tags(trim($post->title));
        //$title = str_replace('-', ' ', $title);
        $title = preg_replace("/[^A-Za-z0-9\s.]/", '', $title);

        $related = Post::whereRaw('MATCH(title,description) AGAINST(? IN BOOLEAN MODE)', array($title))->where('id','!=',$post->id)->take(6)->get();
        
    	return view('front.show', compact('post', 'related'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (empty($category)) {
            abort(404);
        }
        $id = $category->id;
        $post = Post::with('user')->whereHas('category', function($q) use ($id){
            $q->whereId($id)->orWhere('parent_id', $id);
        })->orderBy('id', 'desc')->paginate(10);

        if ($category->parent_id == 1) {
            $kecamatan = Kecamatan::where('category_id', $id)->first();
            return view('front.category-kecamatan', compact('category', 'post', 'kecamatan'));
        }
        else {
            return view('front.category', compact('category', 'post'));
        }
    }

    public function label($slug)
    {
        $label = Label::where('slug', $slug)->first();
        if (empty($label)) {
            abort(404);
        }
        $id = $label->id;
        $post = Post::with('user')->whereHas('label', function($q) use ($id){
            $q->whereId($id);
        })->orderBy('id', 'desc')->paginate(10);

        return view('front.label', compact('label', 'post'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            's' => 'required|min:3|max:150'
        ]);
        $s = $request->input('s');
        $search = strip_tags(trim($s));
        $search = str_replace('-', ' ', $search);

        $highlight = explode(' ', $search);

        $post = Post::with('user')->whereRaw('MATCH(title,description) AGAINST(? IN BOOLEAN MODE)', array($search))->paginate(10);

        $post->setPath('cari');

        return view('front.search', compact('post', 'search', 'highlight'));
    }

    public function page($slug)
    {
        
        $page = Page::where('slug', $slug)->first();
        if (empty($page)) {
            abort(404);
        }

        return view('front.page', compact('page','slug'));
    }

    public function contact($slug)
    {
        $contact = Setting::where('key', $slug)->first();
        if (empty($contact)) {
            abort(404);
        }

        return view('front.contact', compact('contact'));
    }

    public function getContact(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:150',
            'email' => 'required|email',
            'telp' => 'numeric',
            'judul' => 'required|min:3|max:150',
            'deskripsi' => 'required|min:20|max:2000'
        ]);

        $input['name'] = htmlentities(strip_tags(trim($request->input('nama'))));
        $input['email'] = htmlentities(strip_tags(trim($request->input('email'))));
        $input['telp'] = htmlentities(strip_tags(trim($request->input('telp'))));
        $input['title'] = htmlentities(strip_tags(trim($request->input('judul'))));
        $input['description'] = htmlentities(trim($request->input('deskripsi')));
        $input['status'] = 1;

        $desc = $input['description'];

        /* Untuk Kirim Email hasil dari contact form*/
        $output['messageLines'] = explode("\n", $input['description']);
        $set = Setting::where('key', 'terima-email')->first();
        $penmail = unserialize($set->value);

        $data = array(
                'nama' => $input['name'],
                'email' => $input['email'],
                'messageLines' => $output['messageLines']
            );

        Contact::create($input);

        foreach($penmail as $pE){
            Mail::send('emails.contact', $data, function ($message) use ($data, $pE){
                $message->from('admin@wamet.com', 'Administrator Wamet');
                $message->subject('Ada Pesan dari: ' . $data['nama'])
                        ->to($pE);
            });
        }

        /*foreach($penmail as $pM){
            $job = new SendEmailContact($pM, $data);

            $this->dispatch($job);
        }*/

        //dd($penmail);

        flash()->success('Terima kasih, Pesan Anda telah terkirim.');

        return Redirect::back();
    }
}

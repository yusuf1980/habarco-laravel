<?php

namespace App\Http\Controllers;

use App\Page;
use App\Menu;
use Redirect;
use Validator;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenusController extends Controller
{
    public function topMenu()
    {
    	$menus = Menu::where('type', 'top')->orderBy('order', 'asc')->get();
    	$pages = Page::all();
    	$categories = Category::with('childs','parent','childs.childs','childs.childs.childs')
            ->whereNull('parent_id')->orderBy('title', 'asc')->get();
    	return view('back.menu.topmenu', compact('menus', 'pages', 'categories'));
    }

    public function updateTop(Request $request)
    {
        $count = count($request->input('id'));

        $n = 1;
        for($i=0;$i<=$count-1;$i++) {
            $menu = Menu::find($request->input('id')[$i]);
            $input['title'] = $request->input('nama')[$i];
            $input['type'] = 'top';
            $input['order'] = $n;
            $input['parent_id'] = 0;
            $input['format'] = $request->input('format')[$i];
            $input['title_attr'] = $request->input('titleattribute')[$i];
            $input['url'] = $request->input('url')[$i];
            $menu->update($input);
            $n++;
        }

        flash()->success('Menu telah diedit.');

        return Redirect::back();
    }

    public function ajaxPage(Request $request)
    {
        if($request->ajax()){
            
            $type = $request->input('type');
            $response = [];

            if($request->has('home')) {
                if( $type == 'top' ) {
                    $count = Menu::where('type', 'top')->count();
                }elseif($type == 'second') {
                    $count = Menu::where('type', 'second')->count();
                }
                $var = [];
                $input['title'] = 'Home';
                $input['url'] = '/';
                $input['type'] = $type;
                $input['order'] = $count + 1;
                $input['parent_id'] = 0;
                $input['format'] = 'page';
                $input['title_attr'] = 'Home';
                $menu = Menu::create($input);
                $var['id'] = $menu->id;
                $var['title'] = $menu->title;
                $var['url'] = $menu->url;
                $var['format'] = $menu->format;
                $var['title_attr'] = $menu->title_attr;
                $response[] = $var;
            }
            if($request->has('contact')) {
                $urlcontact = $request->input('contact');
                if( $type == 'top' ) {
                    $count = Menu::where('type', 'top')->count();
                }elseif($type == 'second') {
                    $count = Menu::where('type', 'second')->count();
                }
                $var = [];
                $input['title'] = 'Contact Us';
                $input['url'] = $urlcontact;
                $input['type'] = $type;
                $input['order'] = $count + 1;
                $input['parent_id'] = 0;
                $input['format'] = 'page';
                $input['title_attr'] = 'Contact Us';
                $menu = Menu::create($input);
                $var['id'] = $menu->id;
                $var['title'] = $menu->title;
                $var['url'] = $menu->url;
                $var['format'] = $menu->format;
                $var['title_attr'] = $menu->title_attr;
                $response[] = $var;
            }
            
            if($request->has('page')) {
                $page = $request->input('page');
                if( $type == 'top' ) {
                    $count = Menu::where('type', 'top')->count();
                }elseif($type == 'second') {
                    $count = Menu::where('type', 'second')->count();
                }
                $c = $count + 1;
                foreach ($page as $key => $value) {
                    $var = [];
                    $page = Page::find($value['value']);
                    $input['title'] = $page->title;
                    $input['url'] = 'page/'.$page->slug;
                    $input['type'] = $type;
                    $input['order'] = $c;
                    $input['parent_id'] = 0;
                    $input['format'] = 'page';
                    $input['title_attr'] = $page->title;
                    $menu = Menu::create($input);
                    $var['id'] = $menu->id;
                    $var['title'] = $menu->title;
                    $var['url'] = $menu->url;
                    $var['format'] = $menu->format;
                    $var['title_attr'] = $menu->title_attr;
                    $response[] = $var;
                    $c++;
                }
            }
        }

        return response()->json($response);
    }

    public function ajaxLink(Request $request)
    {
        if($request->ajax()){
            $type = $request->input('type');
            $response = [];

            if($request->has('url')) {
                $url = $request->input('url');
                $name = $request->input('name');
                if( $type == 'top' ) {
                    $count = Menu::where('type', 'top')->count();
                }elseif($type == 'second') {
                    $count = Menu::where('type', 'second')->count();
                }
                $var = [];
                $input['title'] = $name;
                $input['url'] = $url;
                $input['type'] = $type;
                $input['order'] = $count + 1;
                $input['parent_id'] = 0;
                $input['format'] = 'custom';
                $input['title_attr'] = $name;
                $menu = Menu::create($input);
                $var['id'] = $menu->id;
                $var['title'] = $menu->title;
                $var['url'] = $menu->url;
                $var['format'] = $menu->format;
                $var['title_attr'] = $menu->title_attr;
                $response[] = $var;

                return response()->json($response);
            }
        }
    }

    public function ajaxCategory(Request $request)
    {
        if($request->ajax()){
            $type = $request->input('type');
            //$response = [];
            $category = $request->input('category');

            if($request->has('category')) {
                $category = $request->input('category');
                if( $type == 'top' ) {
                    $count = Menu::where('type', 'top')->count();
                }elseif($type == 'second') {
                    $count = Menu::where('type', 'second')->count();
                }
                $c = $count + 1;
                foreach ($category as $key => $value) {
                    $var = [];
                    $category = Category::find($value['value']);
                    $input['title'] = $category->title;
                    $input['url'] = 'kategori/'.$category->slug;
                    $input['type'] = $type;
                    $input['order'] = $c;
                    $input['parent_id'] = 0;
                    $input['format'] = 'category';
                    $input['title_attr'] = $category->title;
                    $menu = Menu::create($input);
                    $var['id'] = $menu->id;
                    $var['title'] = $menu->title;
                    $var['url'] = $menu->url;
                    $var['format'] = $menu->format;
                    $var['title_attr'] = $menu->title_attr;
                    $response[] = $var;
                    $c++;
                }
                
            }



            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $menu = Menu::find($request->input('id'));
            $menu->delete();

            $response = ['result'=>'success'];

            return response()->json($response);
        }
    }

    public function secondMenu()
    {
    	$menus = Menu::where('type', 'second')->orderBy('order', 'asc')->get();
        $pages = Page::all();
        $categories = Category::with('childs','parent','childs.childs','childs.childs.childs')->orderBy('title', 'asc')->get();
    	return view('back.menu.secondmenu', compact('menus','pages','categories'));
    }

    public function updateSecond(Request $request)
    {
        $count = count($request->input('id'));

        $n = 1;
        for($i=0;$i<=$count-1;$i++) {
            $menu = Menu::find($request->input('id')[$i]);
            $input['title'] = $request->input('nama')[$i];
            $input['type'] = 'second';
            $input['order'] = $n;
            $input['parent_id'] = 0;
            $input['format'] = $request->input('format')[$i];
            $input['title_attr'] = $request->input('titleattribute')[$i];
            $input['url'] = $request->input('url')[$i];
            $menu->update($input);
            $n++;
        }

        flash()->success('Menu telah diedit.');

        return Redirect::back();
    }


}

<?php

namespace App\Http\ViewComposers;

use App\Setting;
use App\Category;
use Illuminate\Contracts\View\View;

class CategoryFooterComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //$top = Menu::where('type','top')->orderBy('order','asc')->get();
        //$second = Menu::where('type','second')->orderBy('order','asc')->get();

        $set = Setting::where('key','footer-kategori')->first(); 
        $unserialize = unserialize($set->value);
        $cat1 = Category::where('parent_id', $unserialize['kategori-1']['id'])->orderBy('title','asc')->take(6)->get();
        $cat2 = Category::where('parent_id', $unserialize['kategori-2']['id'])->orderBy('title','asc')->take(6)->get();
        
        $view->with(['cat1'=>$cat1, 'cat2'=>$cat2]);
    }
}
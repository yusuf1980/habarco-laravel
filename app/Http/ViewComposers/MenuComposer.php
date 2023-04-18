<?php

namespace App\Http\ViewComposers;

use App\Menu;
use Illuminate\Contracts\View\View;

class MenuComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $top = Menu::where('type','top')->orderBy('order','asc')->get();
        $second = Menu::where('type','second')->orderBy('order','asc')->get();
        
        $view->with(['top'=>$top, 'second'=>$second]);
    }
}
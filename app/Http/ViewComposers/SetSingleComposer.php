<?php

namespace App\Http\ViewComposers;

use App\Setting;
use Illuminate\Contracts\View\View;

class SetSingleComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $set = Setting::all();
        
        $view->with('set',$set);
    }
}
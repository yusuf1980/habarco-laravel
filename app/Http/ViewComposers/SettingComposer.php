<?php

namespace App\Http\ViewComposers;

use App\Setting;
use Illuminate\Contracts\View\View;

class SettingComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $setting = Setting::all();
        $view->with('setting', $setting);
    }
}
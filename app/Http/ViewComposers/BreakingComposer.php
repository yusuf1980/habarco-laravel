<?php

namespace App\Http\ViewComposers;

use App\Post;
use Illuminate\Contracts\View\View;

class BreakingComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $breaking = Post::where('breaking', 1)->orderBy('id','desc')->take(6)->get();
        
        $view->with('breaking', $breaking);
    }
}
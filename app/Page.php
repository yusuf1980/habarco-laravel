<?php

namespace App;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use \App\Scope\Published;
    
    protected $fillable = ['title','slug','user_id','description','image','published','meta_keyword','meta_description','view'];

    // set field be seo 
    public function setSlugAttribute($slug)
    {
        $slugify = new Slugify();

        $this->attributes['slug'] = $slugify->slugify($slug);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

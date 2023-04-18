<?php

namespace App;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

    public function post()
    {
    	return $this->belongsToMany('App\Post');
    }

    public function setTitleAttribute($title)
    {
        $replace = preg_replace("/[^A-Za-z0-9\s.]/", '', $title);
        $this->attributes['title'] = ucwords(strtolower($replace)); 
    }

    // set field be seo 
    public function setSlugAttribute($slug)
    {
        $slugify = new Slugify();

        $this->attributes['slug'] = $slugify->slugify($slug);
    }
}

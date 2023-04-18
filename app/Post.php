<?php

namespace App;

use App\Stat;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \App\Scope\Published;

    protected $fillable = ['title','slug','user_id','description','image','published','meta_keyword','meta_description','view', 'headnews', 'breaking'];
    
    public function category()
    {
    	return $this->belongsToMany('App\Category');
    }

    public function label()
    {
    	return $this->belongsToMany('App\Label');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // set field be seo 
    public function setSlugAttribute($slug)
    {
        $slugify = new Slugify();

        $this->attributes['slug'] = $slugify->slugify($slug);
    }

    public function stats()
    {
        return $this->morphOne('App\Stat', 'trackable');
    }

    public function hit()
    {
        //check if a polymorphic relation can be set
        if($this->exists){
            $stats = $this->stats()->first();
            if( empty( $stats ) ){
                //associates a new Stats instance for this instance
                $stats = new Stat();
                $this->stats()->save($stats);
            }
            return $stats->updateStats();
        }
        return false;
    }
}

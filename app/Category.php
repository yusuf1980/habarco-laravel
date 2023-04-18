<?php

namespace App;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'format', 'description', 'parent_id', 'color'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove relations to products
            $model->post()->detach();

            foreach ($model->childs as $child) {
                $child->parent_id = null;
                $child->save();
            }
        });
    }

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

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function kecamatan()
    {
        return $this->hasMany('App\Kecamatan');
    }
}

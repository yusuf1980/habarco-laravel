<?php
namespace App;

//use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    Protected $fillable = ['title','parent_id','url','type','order','title_attr', 'format'];

    // set field be seo 
    /*public function setSlugAttribute($slug)
    {
        $slugify = new Slugify();

        $this->attributes['slug'] = $slugify->slugify($slug);
    }*/

    public function setTitleAttribute($title)
    {
    	$this->attributes['title'] = ucwords($title);
    }
}

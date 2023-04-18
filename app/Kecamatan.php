<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['title', 'category_id', 'description', 'information', 'image'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}

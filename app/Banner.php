<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use \App\Scope\Published;

    protected $fillable = ['title', 'image', 'url', 'user_id', 'startdate', 'enddate', 'published', 'instansi', 'name', 'description'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'telp', 'title', 'description', 'status'];

    public function setNameAttribute($name)
    {
        $replace = preg_replace("/[^A-Za-z0-9\s.]/", '', $name);
        $this->attributes['name'] = ucwords(strtolower($replace)); 
    }
}

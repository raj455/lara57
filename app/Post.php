<?php

namespace App;

use App\Category;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
    public function categories()
    {
    	return $this->belongsToMany(Category::class)->withTimestamps();
    }

}

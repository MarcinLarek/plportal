<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function getRouteKeyName()
   {
       return 'section'; // db column name you would like to appear in the url.
   }

    public function category() {
       return $this->hasMany(Category::class);
    }

    public function post() {
       return $this->hasMany(Post::class);
    }
}

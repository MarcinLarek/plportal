<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Section extends Model
{
    use HasFactory, QueryCacheable;
    protected $cacheFor = 600;

    public function getRouteKeyName()
    {
        return 'sectionseo'; // db column name you would like to appear in the url.
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function getcategories() {
      return $this->hasMany(Category::class);
      //$categorylist = Category::where('section_id',$this->id)->get();
      // return $categorylist;
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getposts()
    {
        $categoriesIds = $this->categories->pluck(['id'])->toArray();
        $postIds = PostCategories::whereIn('category_id', $categoriesIds)->get()->pluck(['post_id'])->toArray();
        return Post::whereIn('id', $postIds)->get();
    }

    public function menaged()
    {
        return $this->belongsToMany(Admin::class);
    }
}

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

    public function getposts()
    {
        $categorylist = Category::where('section_id', $this->id)->select('id')->get();
        $filteredcategories = PostCategories::take(0)->get();
        foreach ($categorylist as $catli) {
            $temp1 = PostCategories::where('category_id', $catli->id)->select('post_id')->get();;
            foreach ($temp1 as $tempp1) {
                $filteredcategories->push($tempp1);
            }
        }
        $posttoshow = Post::take(0)->get();
        foreach ($filteredcategories as $filtcat) {
            $temp = Post::where('id', $filtcat->post_id)->select('id', 'title', 'seo', 'image', 'summary')->orderByDesc('created_at')->get();
            foreach ($temp as $tempp) {
                $posttoshow->push($tempp);
            }
        }
        $posts = $posttoshow->unique();
        return $posts;
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

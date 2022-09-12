<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Category;
use App\Models\PostCategories;

class PostController extends Controller
{

  public function index(Section $section)
  {

      $posts = $section->getposts()->sortDesc();

      $categorylist = Category::where('section_id',$section->id)
                               ->where('parent_category_id',null)
                               ->get();
      if ($section->id == 1) {
        $posts = $posts->sortDesc()->take(37);
      }
      else {
        $posts = $posts->sortDesc()->take(28);
      }
      $sections = Section::get();
      $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
      try {
        return view($cleansection.'.index')
         ->with('posts', $posts)
         ->with('categories', $categorylist)
         ->with('serachsection', $section)
         ->with('section', $cleansection)
         ->with('sections', $sections);
      } catch (\Exception $e) {
        return view('basic.index')
         ->with('posts', $posts)
         ->with('categories', $categorylist)
         ->with('serachsection', $section)
         ->with('section', $cleansection)
         ->with('sections', $sections);
      }

  }

  public function show(Section $section, Post $post)
  {

    $posts = $section->getposts()->sortByDesc('created_at')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $post->reads++;
    $post->update();
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $admin = Admin::where('id',$post->admin_id)->first();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
    try {
      return view($cleansection.'.show')
      ->with('post', $post)
      ->with('posts', $posts)
      ->with('topposts', $topposts)
      ->with('section', $cleansection)
      ->with('serachsection', $section)
      ->with('sections', $sections)
      ->with('admin', $admin)
      ->with('categories', $categorylist);
    } catch (\Exception $e) {
      return view('basic.show')
      ->with('post', $post)
      ->with('posts', $posts)
      ->with('topposts', $topposts)
      ->with('section', $cleansection)
      ->with('serachsection', $section)
      ->with('sections', $sections)
      ->with('admin', $admin)
      ->with('categories', $categorylist);
    }

  }

  public function category(Section $section, Category $category)
  {
    $main = $category->getposts()->sortDesc()->paginate( 20 );
    $posts = $section->getposts()->sortByDesc('created_at')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));

    try {
      return view($cleansection.'.category')
      ->with('main', $main)
      ->with('posts', $posts)
      ->with('topposts', $topposts)
      ->with('section', $cleansection)
      ->with('serachsection', $section)
      ->with('sections', $sections)
      ->with('topcategory', $category->category)
      ->with('categories', $categorylist);
    } catch (\Exception $e) {
      return view('basic.category')
      ->with('main', $main)
      ->with('posts', $posts)
      ->with('topposts', $topposts)
      ->with('section', $cleansection)
      ->with('serachsection', $section)
      ->with('sections', $sections)
      ->with('topcategory', $category->category)
      ->with('categories', $categorylist);
    }

  }

  public function search(Section $section, Request $request)
  {
    $search = $request['serach'];
    if ($search == null) {
        $search = "null";
    }
    return redirect()->route('get.serach', ['section' => $section, 'search' => $search]);
  }

  public function getsearch(Section $section, $search)
  {
    if ($search == "null") {
        $search = null;
    }
    $main = Post::where('title','like', '%'.$search.'%')
                              ->orwhere('postcontent','like', '%'.$search.'%')
                              ->orderBy('id', 'DESC')
                              ->get();
    $loop = 0;
    foreach ($main as $temp) {
      if ($temp->getsection()->id != $section->id) {
        $main->forget($loop);
      }
      $loop++;
    }

    $main = $main->paginate( 20 );
    $posts = $section->getposts()->sortByDesc('created_at')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
    try {
      return view($cleansection.'.category')
      ->with('main', $main)
      ->with('posts', $posts)
      ->with('topposts', $topposts)
      ->with('section', $cleansection)
      ->with('serachsection', $section)
      ->with('sections', $sections)
      ->with('search', $search)
      ->with('categories', $categorylist);
    } catch (\Exception $e) {
      return view('basic.category')
      ->with('main', $main)
      ->with('posts', $posts)
      ->with('topposts', $topposts)
      ->with('section', $cleansection)
      ->with('serachsection', $section)
      ->with('sections', $sections)
      ->with('search', $search)
      ->with('categories', $categorylist);
    }

  }

}

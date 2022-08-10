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
    if ($section->id == 9) {
      return $this->naukaitechnologie($section);
    }

      $posts = $section->getposts()->sortDesc();

      $categorylist = Category::where('section_id',$section->id)
                               ->where('parent_category_id',null)
                               ->get();
      $firstpost = $posts->sortDesc()->first();
      $posts = $posts->sortDesc()->slice(1)->take(28);
      $sections = Section::get();
      $navbarsection = $section->section;
      return view($section->section.'.index')
       ->with('firstpost', $firstpost)
       ->with('posts', $posts)
       ->with('categories', $categorylist)
       ->with('section', $navbarsection)
       ->with('sections', $sections);
  }

  public function show(Section $section, Post $post)
  {

    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $post->reads++;
    $post->update();
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $admin = Admin::where('id',$post->admin_id)->first();
    return view($section->section.'.show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $section->section)
    ->with('sections', $sections)
    ->with('admin', $admin)
    ->with('categories', $categorylist);
  }

  public function category(Section $section, Category $category)
  {
    $main = $category->getposts()->sortDesc()->paginate( 10 );
    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();

    return view($section->section.'.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $section->section)
    ->with('sections', $sections)
    ->with('categories', $categorylist);
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

    $main = $main->paginate( 10 );
    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();

    return view($section->section.'.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $section->section)
    ->with('sections', $sections)
    ->with('categories', $categorylist);
  }

  public function naukaitechnologie(Section $section)
  {
    $posts = $section->getposts();
    $posts = $posts->sortDesc()->take(3);
    $nauka = Category::where('section_id',$section->id)
                             ->where('id','56')
                             ->first();
    $naukiscisle = Category::where('section_id',$section->id)
                             ->where('id','58')
                             ->first();
    $technologie = Category::where('section_id',$section->id)
                             ->where('id','57')
                             ->first();
    $technikawosjkowa = Category::where('section_id',$section->id)
                            ->where('id','55')
                            ->first();
    $innowtechwgosp = Category::where('section_id',$section->id)
                              ->where('id','53')
                              ->first();
    $innowtechwgosp = $innowtechwgosp->getposts()->take(3);
    $medycyna = Category::where('section_id',$section->id)
                              ->where('id','60')
                              ->first();
    $gry = Category::where('section_id',$section->id)
                              ->where('id','59')
                              ->first();
    $ochronasrodowiska = Category::where('section_id',$section->id)
                              ->where('id','61')
                              ->first();
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $navbarsection = $section->section;
    return view($section->section.'.index')
     ->with('posts', $posts)
     ->with('nauka', $nauka)
     ->with('naukiscisle', $naukiscisle)
     ->with('technologie', $technologie)
     ->with('technikawosjkowa', $technikawosjkowa)
     ->with('innowtechwgosp', $innowtechwgosp)
     ->with('medycyna', $medycyna)
     ->with('gry', $gry)
     ->with('ochronasrodowiska', $ochronasrodowiska)
     ->with('categories', $categorylist)
     ->with('section', $navbarsection)
     ->with('sections', $sections);
  }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategories;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function list($section)
    {
        $permissioncheck = Section::where('section',$section)->first();
        $posts = $permissioncheck->getposts();
        $sections = Section::get();
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        return view('admin.posts.list')
              ->with('sections', $sections)
              ->with('section', $section)
              ->with('posts', $posts)
              ->with('category', $category)
              ->with('permissioncheck',$permissioncheck);
    }

    public function create($section)
    {
        $permissioncheck = Section::where('section',$section)->first();
        $sections = Section::get();
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        return view('admin.posts.create')
              ->with('sections', $sections)
              ->with('section', $section)
              ->with('category', $category)
              ->with('permissioncheck',$permissioncheck);
    }

    public function edit($post)
    {
        $post = Post::find($post);
        $section = $post->getsection();
        $section = $section->section;
        $permissioncheck = Section::where('section',$section)->first();
        $sections = Section::get();
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        return view('admin.posts.edit')
              ->with('post', $post)
              ->with('sections', $sections)
              ->with('section', $section)
              ->with('category', $category)
              ->with('permissioncheck',$permissioncheck);
    }

    public function update($post, UpdateRequest $request)
    {
        $post = Post::find($post);
        $imagePath = request('image')->store('uploads', 'public');
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$imagePath);

        //ImageOptimizer::optimize('storage/'.$imagePath);

        $data = array(
         'title' => $request['title'],
         'summary' => $request['summary'],
         'author' => $request['author'],
         'source' => $request['source'],
         'postcontent' => $request['postcontent'],
         'image' => $imagePath,
       );

      $post->update($data);
        return redirect()->back()->with('successalert', 'successalert');
    }

    public function store(PostRequest $request)
    {
        $request['seo'] = $this->seo($request['seo']);
        $imagePath = request('image')->store('uploads', 'public');
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$imagePath);

        //ImageOptimizer::optimize('storage/'.$imagePath);
        $data = array(
         'admin_id' => auth()->user()->id,
         'title' => $request['title'],
         'seo' => $request['seo'],
         'summary' => $request['summary'],
         'author' => $request['author'],
         'source' => $request['source'],
         'postcontent' => $request['postcontent'],
         'image' => $imagePath,
       );

       $post = Post::create($data);
       //$post = Post::latest()->first();
       foreach ($request['category'] as $cat) {
          $data = array(
            'post_id' => $post['id'],
            'category_id' => $cat
          );
        PostCategories::create($data);
       }

        return redirect()->back()->with('successalert', 'successalert');
    }

    public function seo($title)
    {
      $title = strtolower($title);
      $title = str_replace('ż', 'z', $title);
      $title = str_replace('ą', 'a', $title);
      $title = str_replace('ć', 'c', $title);
      $title = str_replace('ę', 'e', $title);
      $title = str_replace('ł', 'l', $title);
      $title = str_replace('ń', 'n', $title);
      $title = str_replace('ó', 'o', $title);
      $title = str_replace('ś', 's', $title);
      $title = str_replace('ź', 'z', $title);
      $title = str_replace('.', '', $title);
      $title = str_replace(',', '', $title);
      $title = str_replace('?', '', $title);
      $title = str_replace('"', '', $title);
      $title = str_replace('\'', '', $title);
      $title = str_replace('(', '', $title);
      $title = str_replace(')', '', $title);
      $title = str_replace('\\', '', $title);
      $title = str_replace('/', '', $title);
      $title = str_replace('@', '', $title);
      $title = str_replace('#', '', $title);
      $title = str_replace('$', '', $title);
      $title = str_replace('%', '', $title);
      $title = str_replace('^', '', $title);
      $title = str_replace('&', '', $title);
      $title = str_replace('*', '', $title);
      $title = str_replace('”', '', $title);
      $title = str_replace('„', '', $title);
      $title = preg_replace('/\s+/', '-', $title);
      return $title;
    }

    public function delete($id)
    {
      $post = Post::find($id);
      $sections = Section::get();
      return view('admin.posts.postdelete')
      ->with('post', $post)
      ->with('sections', $sections);
    }
    public function deletepost($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('admin.index')->with('successalert', 'successalert');
    }

    public function seomaker()
    {
      //Dla postów posiadających złe SEO
      $posts = Post::get();
      foreach ($posts as $post) {
        $post->seo =  $this->seo($post->seo);
        $post->update();
      }
      return redirect()->route('admin.index')->with('successalert', 'successalert');

      //Dla postów nie posiadających wclae SEO
      /*
      $posts = Post::get();
      foreach ($posts as $post) {
        if ($post->seo == null) {
          $post->seo =  $this->seo(substr($post->title, 0, 100));
          $post->update();
        }
      }
      return redirect()->route('admin.index')->with('successalert', 'successalert');

      */
    }


    public function temppostmaker()
    {
      /*
      $categories = Category::get();

      if (Post::get()->isempty()) {
        $i = 1;
      }
      else {
        $i = Post::orderBy('id', 'desc')->first()->id;
        $i++;
      }

        foreach ($categories as $category) {
          if ($category->getposts()->isempty()) {
            for ($b=0; $b < 11; $b++) {
            $data = array(
             'admin_id' => auth()->user()->id,
             'title' => Str::random(10).' '.Str::random(15),
             'seo' => Str::random(10).' '.Str::random(15),
             'summary' => Str::random(20).' '.Str::random(20),
             'author' => 'Test author',
             'source' => 'test source',
             'postcontent' => 'asdihas dkljsad kljsd ajads oidjs iodsajoiasdj iodsajadsoi jdas iojdsaoi jadsio jsadio jaisodj ioasdj saiojd saiojd ioasj iasdjasdiojasd iodasj ioasd jioasd joiasdj sadioj dsaiojdas is adjiodasjoiasdj ioasjds iojadsiodas jiodsaj idoasj dsaioj dsaiojd asiodj sioasj iasodj asoid jasido jasiojas ofjipsjd dfgjsdi j[-figsj isdgjdaf[sigsdj]]',
             'image' => 'uploads/u1GNj6AAwIYdns643P5qD8eYiEEr1PLhCg5uT8nH.jpg',
           );
           Post::create($data);
           $post = Post::latest()->first();
           $data2 = array(
             'post_id' => $i,
             'category_id' => $category->id,
           );
           PostCategories::create($data2);
           $i++;
           }
          }
        }
        */
      return redirect()->back()->with('successalert', 'successalert');
    }
}

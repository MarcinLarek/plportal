<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Section;

class CategoryController extends Controller
{
    public function create($section)
    {
      $section = Section::where('section', $section)->first();
      $sections = Section::get();
      $category = $section->getcategories();
      return view('admin.category.create')
      ->with('sections', $sections)
      ->with('section', $section)
      ->with('category', $category);
    }

    public function selectsection()
    {
      $sections = Section::get();
      return view('admin.category.selectsection')
      ->with('sections', $sections);
    }

    public function store(Request $request)
    {
      dd($request);
        $request->validate([
          'login' => ['required','max:100'],
          'name' => ['required','max:100'],
          'surname' => ['required','max:100'],
          'password' => ['max:100'],
          'global_privileges' => ['required'],
          'email' => ['required','max:100']
      ]);
        $data = array(
          'login' => $request['login'],
          'name' => $request['name'],
          'surname' => $request['surname'],
          'global_privileges' => $request['global_privileges'],
          'password' => Hash::make($request['password']),
          'email' => $request['email'],
          'token' => Str::random(60)
        );

      $admin = Admin::create($data);
      return redirect()->route('admin.admins')->with('successalert', 'successalert');
    }

}

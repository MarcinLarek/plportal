<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function index()
     {
       $categories = DB::table('category')->get();
       $firstpost = DB::table('posts')->orderBy('id', 'DESC')->first();
       $posts = DB::table('posts')->orderBy('id', 'DESC')->skip(1)->take(4)->get();
       foreach ($posts as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $biznes = DB::table('biznes')->orderBy('id', 'DESC')->take(4)->get();
       foreach ($biznes as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $historia = DB::table('historias')->orderBy('id', 'DESC')->take(6)->get();
       foreach ($historia as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $hobby = DB::table('hobbies')->orderBy('id', 'DESC')->take(10)->get();
       foreach ($hobby as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $kfd = DB::table('kobieta_facet_dzieckos')->orderBy('id', 'DESC')->take(5)->get();
       foreach ($kfd as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $kultura = DB::table('kulturas')->orderBy('id', 'DESC')->take(4)->get();
       foreach ($kultura as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $motoryzacja = DB::table('motoryzacjas')->orderBy('id', 'DESC')->take(5)->get();
       foreach ($motoryzacja as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $naukaitechnologie = DB::table('nauka_i_technologies')->orderBy('id', 'DESC')->take(4)->get();
       foreach ($naukaitechnologie as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $salonpolityczny = DB::table('salon_politycznies')->orderBy('id', 'DESC')->take(5)->get();
       foreach ($salonpolityczny as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $sluzbymundurowe = DB::table('sluzby_mundurowes')->orderBy('id', 'DESC')->take(4)->get();
       foreach ($sluzbymundurowe as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $spoleczenstwo = DB::table('spoleczenstwos')->orderBy('id', 'DESC')->take(5)->get();
       foreach ($spoleczenstwo as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $sport = DB::table('sports')->orderBy('id', 'DESC')->take(4)->get();
       foreach ($sport as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

       $turystyka = DB::table('turystykas')->orderBy('id', 'DESC')->take(5)->get();
       foreach ($turystyka as $post) {
         $post->category = str_getcsv($post->category,"|");
       }

         return view('plportal/index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('biznes', $biznes)
         ->with('historia', $historia)
         ->with('hobby', $hobby)
         ->with('kfd', $kfd)
         ->with('kultura', $kultura)
         ->with('motoryzacja', $motoryzacja)
         ->with('naukaitechnologie', $naukaitechnologie)
         ->with('salonpolityczny', $salonpolityczny)
         ->with('sluzbymundurowe', $sluzbymundurowe)
         ->with('spoleczenstwo', $spoleczenstwo)
         ->with('sport', $sport)
         ->with('turystyka', $turystyka)
         ->with('categories', $categories);
     }

}

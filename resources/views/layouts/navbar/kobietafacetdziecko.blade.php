@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/appkfd.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container pt-4">
  <div class="row">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/kfdnav.png');">
      <a href="{{route('index')}}" class="w-75 h-100"></a>
      <div class="text-end pb-1 w-100">
        <form id="search" action="{{ route('post.serach',['section' => $serachsection] ) }}" method="post">
          @csrf
          <input type="text" name="serach" value="">
          <input type="submit" value="Szukaj">
        </form>
      </div>
  </div>
</div>
<!-- Przyciski do polubienia i udostępnienia strony
<div class="pt-3">
<div class="fb-like" data-href="https://www.facebook.com/plportalpl/" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
</div>
-->
<nav class="navbar-expand-sm bg-section mt-4 mb-4">
  <div class="collapse navbar-collapse">
      <ul class="navbar-nav navbar-section mx-auto">
        <li class="nav-item">
          <a class="nav-link navbaritem-section" href="{{ route( 'post.index', ['section' => $serachsection] ) }}"> <b>Strona Główna</b> </a>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
              Wiadomości
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 27)->first(), 'section' => $categories->where('id', 27)->first()->getsection()]) }}">
                {{$categories->where('id', 27)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 28)->first(), 'section' => $categories->where('id', 28)->first()->getsection()]) }}">
                {{$categories->where('id', 28)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 29)->first(), 'section' => $categories->where('id', 29)->first()->getsection()]) }}">
                {{$categories->where('id', 29)->first()->category}}
            </a>
          </div>
        </li>
        <?php $hobby = $sections->where('id',6)->first(); $hobbycat = $hobby->getcategories(); ?>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.index', ['section' => $hobby]) }}" role="button" data-bs-toggle="dropdown">
              {{$hobby->section}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.index', ['section' => $hobby]) }}">
                {{$hobby->section}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $hobbycat->where('id', 37)->first(), 'section' => $hobby]) }}">
                {{$hobbycat->where('id', 37)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $hobbycat->where('id', 37)->first(), 'section' => $hobby]) }}">
                Artystyczne
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $hobbycat->where('id', 35)->first(), 'section' => $hobby]) }}">
                {{$hobbycat->where('id', 35)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $hobbycat->where('id', 42)->first(), 'section' => $hobby]) }}">
                {{$hobbycat->where('id', 42)->first()->category}}
            </a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 31)->first(), 'section' => $categories->where('id', 31)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 31)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 31)->first(), 'section' => $categories->where('id', 31)->first()->getsection()]) }}">
                {{$categories->where('id', 31)->first()->category}}
            </a>
            @foreach($categories->where('id', 31)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 121)->first(), 'section' => $categories->where('id', 121)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 121)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 121)->first(), 'section' => $categories->where('id', 121)->first()->getsection()]) }}">
                {{$categories->where('id', 121)->first()->category}}
            </a>
            @foreach($categories->where('id', 121)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 30)->first(), 'section' => $categories->where('id', 30)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 30)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 30)->first(), 'section' => $categories->where('id', 30)->first()->getsection()]) }}">
                {{$categories->where('id', 30)->first()->category}}
            </a>
            @foreach($categories->where('id', 30)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 33)->first(), 'section' => $categories->where('id', 33)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 33)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 33)->first(), 'section' => $categories->where('id', 33)->first()->getsection()]) }}">
                {{$categories->where('id', 33)->first()->category}}
            </a>
            @foreach($categories->where('id', 33)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>


      </ul>
  </div>
</nav>

@yield('mainpage')
</div>

@endsection

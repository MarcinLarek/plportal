@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/appnauka.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container pt-4">
  <div class="row">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/naukaitechnologienav.png');">
      <a href="{{route('index')}}" class="w-75 h-100"></a>
      <div class="text-end pb-1 w-100">
        <form id="search" action="{{ route('post.serach',['section' => $section] ) }}" method="post">
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
          <a class="nav-link navbaritem-section" href="{{ route( 'post.index', ['section' => $section] ) }}"> <b>Strona Główna</b> </a>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 56)->first(), 'section' => $categories->where('id', 56)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 56)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 56)->first(), 'section' => $categories->where('id', 56)->first()->getsection()]) }}">
                {{$categories->where('id', 56)->first()->category}}
            </a>
            @foreach($categories->where('id', 56)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 58)->first(), 'section' => $categories->where('id', 58)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 58)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 58)->first(), 'section' => $categories->where('id', 58)->first()->getsection()]) }}">
                {{$categories->where('id', 58)->first()->category}}
            </a>
            @foreach($categories->where('id', 58)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" role="button" data-bs-toggle="dropdown">
              Technologia & Gry
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 57)->first(), 'section' => $categories->where('id', 57)->first()->getsection()]) }}">
                {{$categories->where('id', 57)->first()->category}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 59)->first(), 'section' => $categories->where('id', 59)->first()->getsection()]) }}">
                {{$categories->where('id', 59)->first()->category}}
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 60)->first(), 'section' => $categories->where('id', 60)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 60)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 60)->first(), 'section' => $categories->where('id', 60)->first()->getsection()]) }}">
                {{$categories->where('id', 60)->first()->category}}
            </a>
            @foreach($categories->where('id', 60)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 53)->first(), 'section' => $categories->where('id', 53)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              Technologie
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 53)->first(), 'section' => $categories->where('id', 53)->first()->getsection()]) }}">
                {{$categories->where('id', 53)->first()->category}}
            </a>
            @foreach($categories->where('id', 53)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 54)->first(), 'section' => $categories->where('id', 54)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 54)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 54)->first(), 'section' => $categories->where('id', 54)->first()->getsection()]) }}">
                {{$categories->where('id', 54)->first()->category}}
            </a>
            @foreach($categories->where('id', 54)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 61)->first(), 'section' => $categories->where('id', 61)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              Środowisko
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 61)->first(), 'section' => $categories->where('id', 61)->first()->getsection()]) }}">
                {{$categories->where('id', 61)->first()->category}}
            </a>
            @foreach($categories->where('id', 61)->first()->getsubcategories() as $sub)
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

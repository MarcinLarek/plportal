@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/appsilyzbrojne.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container mt-3">
  <div class="row d-none d-sm-block d-md-block">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/silyzbrojnenav.png');">
      <a href="{{route('index')}}" class="w-50 h-100"></a>
  </div>
</div>
<div class="text-end mt-1 w-100">
  <form id="search" action="{{ route('post.serach',['section' => $serachsection] ) }}" method="post">
    @csrf
    <input type="text" name="serach" value="">
    <input type="submit" class="bg-section" value="Szukaj">
  </form>
</div>


<nav class="navbar-expand-sm bg-section mt-1 mb-3">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent2" aria-controls="navbarToggleExternalContent2" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img class="image-fluid" src="/storage/hamburrger.png" alt=""></span>
  </button> <b class="navbar-toggler"> Kategorie </b>

  <div class="collapse navbar-collapse" id="navbarToggleExternalContent2">
      <ul class="navbar-nav navbar-section mx-auto">
        <li class="nav-item">
          <a class="nav-link navbaritem-section" href="{{ route( 'post.index', ['section' => $serachsection] ) }}"> <b>Strona Główna</b> </a>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.index', ['category' => $categories->where('id', 80)->first(), 'section' => $categories->where('id', 80)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 80)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 80)->first(), 'section' => $categories->where('id', 80)->first()->getsection()]) }}">
                {{$categories->where('id', 80)->first()->category}}
            </a>
            @foreach($categories->where('id', 80)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 81)->first(), 'section' => $categories->where('id', 81)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 81)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 81)->first(), 'section' => $categories->where('id', 81)->first()->getsection()]) }}">
                {{$categories->where('id', 81)->first()->category}}
            </a>
            @foreach($categories->where('id', 81)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 82)->first(), 'section' => $categories->where('id', 82)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 82)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 82)->first(), 'section' => $categories->where('id', 82)->first()->getsection()]) }}">
                {{$categories->where('id', 82)->first()->category}}
            </a>
            @foreach($categories->where('id', 82)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>


        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 83)->first(), 'section' => $categories->where('id', 83)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 83)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 83)->first(), 'section' => $categories->where('id', 83)->first()->getsection()]) }}">
                {{$categories->where('id', 83)->first()->category}}
            </a>
            @foreach($categories->where('id', 83)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.index',['section' => $sections->where('id', 6)->first()->section]) }}" role="button" data-bs-toggle="dropdown">
              {{$sections->where('id', 6)->first()->section}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.index',['section' => $sections->where('id', 6)->first()->section]) }}">
                {{$sections->where('id', 6)->first()->section}}
            </a>
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sections->where('id', 6)->first()->getcategories()->where('id',118)->first(), 'section' => $sections->where('id', 6)->first()]) }}">
                {{$sections->where('id', 6)->first()->getcategories()->where('id',118)->first()->category}}
            </a>
        </li>

      </ul>
  </div>
</nav>

@yield('mainpage')
</div>

@endsection

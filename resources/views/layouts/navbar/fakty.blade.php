@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/appfakty.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container mt-3">
  <div class="row d-none d-sm-block d-md-block">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/faktynav.png');">
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

        @foreach($categories as $category)

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$category->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">
                {{$category->category}}
            </a>
            @foreach($category->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        @endforeach
      </ul>
  </div>
</nav>

@yield('mainpage')
</div>

@endsection

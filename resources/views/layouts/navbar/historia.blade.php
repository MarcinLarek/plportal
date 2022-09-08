@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/apphistoria.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container mt-3">
  <div class="row d-none d-sm-block d-md-block">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/historianav.png');">
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
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 95)->first(), 'section' => $categories->where('id', 95)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 95)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 95)->first(), 'section' => $categories->where('id', 95)->first()->getsection()]) }}">
                {{$categories->where('id', 95)->first()->category}}
            </a>
            @foreach($categories->where('id', 95)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 90)->first(), 'section' => $categories->where('id', 90)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 90)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 90)->first(), 'section' => $categories->where('id', 90)->first()->getsection()]) }}">
                {{$categories->where('id', 90)->first()->category}}
            </a>
            @foreach($categories->where('id', 90)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 91)->first(), 'section' => $categories->where('id', 91)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 91)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 91)->first(), 'section' => $categories->where('id', 91)->first()->getsection()]) }}">
                {{$categories->where('id', 91)->first()->category}}
            </a>
            @foreach($categories->where('id', 91)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 92)->first(), 'section' => $categories->where('id', 92)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 92)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 92)->first(), 'section' => $categories->where('id', 92)->first()->getsection()]) }}">
                {{$categories->where('id', 92)->first()->category}}
            </a>
            @foreach($categories->where('id', 92)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 93)->first(), 'section' => $categories->where('id', 93)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 93)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 93)->first(), 'section' => $categories->where('id', 93)->first()->getsection()]) }}">
                {{$categories->where('id', 93)->first()->category}}
            </a>
            @foreach($categories->where('id', 93)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 94)->first(), 'section' => $categories->where('id', 94)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 94)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 94)->first(), 'section' => $categories->where('id', 94)->first()->getsection()]) }}">
                {{$categories->where('id', 94)->first()->category}}
            </a>
            @foreach($categories->where('id', 94)->first()->getsubcategories() as $sub)
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $sub, 'section' => $sub->getsection()]) }}">
                {{$sub->category}}
            </a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link navbaritem-section dropdown-toggle" href="{{ route('post.category', ['category' => $categories->where('id', 96)->first(), 'section' => $categories->where('id', 96)->first()->getsection()]) }}" role="button" data-bs-toggle="dropdown">
              {{$categories->where('id', 96)->first()->category}}
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item border-solid" href="{{ route('post.category', ['category' => $categories->where('id', 96)->first(), 'section' => $categories->where('id', 96)->first()->getsection()]) }}">
                {{$categories->where('id', 96)->first()->category}}
            </a>
            @foreach($categories->where('id', 96)->first()->getsubcategories() as $sub)
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

@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/faktynav.png');">
        <div class="text-end pb-1 w-100">
          <form id="search" action="{{ route('post.serach',['section' => $section] ) }}" method="post">
            @csrf
            <input type="text" name="serach" value="">
            <input type="submit" value="Szukaj">
          </form>
        </div>
    </div>
  </div>

<div class="pt-3 pb-4">
  <div class="fb-like" data-href="https://www.facebook.com/plportalpl/" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
</div>

<div class="card" style="padding:6px;">
</div>

<nav class="navbar-expand-sm bg-primary">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link secondnavbaritem" href="{{route('index')}}">PLPORTAL.pl</a>
          </li>
          <li class="nav-item">
            <a class="nav-link secondnavbaritem" href="{{ route( 'post.index', ['section' => $section] ) }}">Strona Główna</a>
          </li>
          @foreach($categories as $category)
            <li class="nav-item">
              <a class="nav-link secondnavbaritem" href="{{ route('post.category', ['category' => $category, 'section' => $category->getsection()]) }}">{{$category->category}}</a>
            </li>
          @endforeach
        </ul>
    </div>
</nav>

<div class="row pt-3 pb-3">
  <div class="col-2">
    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
      <option selected>Polski</option>
      <option value="1">Angielski</option>
    </select>
  </div>
</div>

@yield('mainpage')
</div>

@endsection

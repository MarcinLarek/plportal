@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 d-flex  justify-content-between headerimage w-100" style="background-image:  url('/storage/salonpolitycznynav.png');">
        <div class="text-end pb-1 w-100">
          <form id="search" action="{{route('salonpolityczny.serach')}}" method="get">
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
            <a class="nav-link secondnavbaritem" href="#">PLPORTAL.pl</a>
          </li>
          <li class="nav-item">
            <a class="nav-link secondnavbaritem" href="{{ route('salonpolityczny.index') }}">Strona Główna</a>
          </li>
          @foreach($categories as $category)
            @if($category->section == 'Salon polityczny')
            <li class="nav-item">
              <a class="nav-link secondnavbaritem" href="{{ route('fakty.category', ['category' => $category->category]) }}">{{$category->category}}</a>
            </li>
            @endif
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

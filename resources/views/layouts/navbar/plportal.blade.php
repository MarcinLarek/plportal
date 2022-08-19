@extends('layouts.app')
@section('content')

<div class="container">

<div class="row pt-5 pb-4">
  <div class="col-4">
    <img src="/storage/logo.png" style="width:70%" alt="">
  </div>
  <div class="col-4">
<div class="fb-like" data-href="https://www.facebook.com/plportalpl/" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
  </div>
  <div class="col-4">

  </div>
</div>

@yield('mainpage')
</div>

@endsection


@extends('layouts.navbar.spoleczenstwo')
@section('mainpage')
<div class="row">
    <div class="col-xl-9 col-l-9 col-md-12 col-sm-12 ">
        <div class="d-flex justify-content-center">
            <h1> <b>{{$post->title}}</b> </h1>
        </div>
        <div class="row">
          <img src="/storage/{{$post->image}}" alt=""><br/>
          {!!$post->postcontent!!}
        </div>
        <div class="row">
          <p> <b>Autor:</b> <br/>
           {{$post->author}} </p>
          <p> <b>Żródło:</b> <br/>
            {{$post->source}} </p>
        </div>
        <div class="row">
          <p><b> Dział: </b>
          @foreach ($post->category as $tag)
          <a href="/dzial/{{$tag}}">{{$tag}} </a>
          @endforeach</p>
        </div>
    </div>



    <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 ">
      <div class="row mb-2 rightheader border-top border-bottom border-dark text-center">
        <div class="col-12">
          INNE WIADOMOŚĆI
        </div>
      </div>
    @foreach($posts as $list)
     @break($loop->iteration == 6)
    <div class="row">

        <div class="mb-2 col-3 minisquare d-flex" style="background-image: url('/storage/{{ $list->image }}')"><a class="w-100" href="{{ route('spoleczenstwo.show', ['post' => $list->title]) }}">
  </a></div>

      <div class="col-9">
        <div class="">
          <a href="{{ route('spoleczenstwo.show', ['post' => $list->title]) }}">
            <b class="text-primary" style="font-size:12px;"> {{$list->title}}</b>
          </a>
        </div>
        <div  class="" style="font-size:12px;">
          {{strip_tags(substr($list->postcontent, 0, 50))}}...
        </div>
      </div>
    </div>
    @endforeach
    <div class="row mb-2 rightheader border-top border-bottom border-dark text-center">
      <div class="col-12">
        NAJCZĘŚCIEJ CZYTANE
      </div>
    </div>
    @foreach($topposts as $list)
     <div class="col-12">
       <a href="{{ route('spoleczenstwo.show', ['post' => $list->title]) }}">
         <b class="text-dark"> {{$list->title}}</b>
       </a>
     <hr>
     </div>
    @endforeach
    <div class="row mb-2 rightheader border-top border-bottom border-dark text-center">
      <div class="col-12">
        Z INNYCH DZIAŁÓW
      </div>
    </div>
    @foreach($posts as $list)
    @continue($loop->iteration < 6)
    <div class="row">

        <div class="mb-2 col-4 minisquare d-flex" style="background-image: url('/storage/{{ $list->image }}')"><a class="w-100" href="{{ route('spoleczenstwo.show', ['post' => $list->title]) }}">
    </a></div>

      <div class="col-8">
        <div class="">
          <a href="{{ route('spoleczenstwo.show', ['post' => $list->title]) }}">
            <b class="text-primary"> {{$list->title}}</b>
          </a>
        </div>
      </div>
    </div>
    @endforeach

    </div>



</div>
<div class="row">
  <div class="col-12 d-flex justify-content-center">
    <a data-pin-do="buttonBookmark" href="https://www.pinterest.com/pin/create/button/"></a>
    <div class="pe-1 ps-1"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweetnij</a></div>
    <div class="fb-like" data-href="https://www.facebook.com/plportalpl/" data-width="" data-share="true" data-layout="button"  data-action="like" data-size="large"></div>
  </div>
</div>

<div class="row pt-2">
  <b>Oceń artykuł:</b>
</div>
@endsection

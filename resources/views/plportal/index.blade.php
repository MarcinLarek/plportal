@extends('layouts.navbar.plportal')
@section('mainpage')
<div class="row ads">
  <div class="col w-100 text-center">
  REKLAMA
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5476273745604280"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-5476273745604280"
     data-ad-slot="8175158206"
     data-adtest="on"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>
</div>
@if(count($posts) < 4 or is_null($firstpost))
@else
<div class="row">
    <div class="col-xl-8 col-l-8 col-md-12 col-sm-12 ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="/storage/{{ $firstpost->image }}" class="carouselphoto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('fakty.show', ['post' => $firstpost->title]) }}"><h5>{{$firstpost->title}}</h5></a>
                    </div>
                </div>

                @foreach ($posts as $post)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image }}" class="carouselphoto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('fakty.show', ['post' => $post->title]) }}"><h5>{{$post->title}}</h5></a>
                    </div>
                </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-xl-4 col-l-4 col-md-12 col-sm-12 col-12">
        @foreach ($biznes as $post)
            <div class="row pt-1">
                <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5 col-12">
                    <a href="{{ route('biznes.show', ['post' => $post->title]) }}"><img src="/storage/{{ $post->image }}" class="w-100 rightlistphoto"></a>
                </div>
                <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 col-12 rightlisttext">
                    <a href="{{ route('biznes.show', ['post' => $post->title]) }}"><b>{{$post->title}}</b></a>
                    <p>{{strip_tags(substr($post->postcontent, 0, 100))}}...</p>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endif

@if(count($historia) < 6)
@else
<div class="row pt-3">
  <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 bordercolumns d-flex" style="background-image: url('/storage/{{$historia[0]->image}}')">
    <a href="{{ route('fakty.show', ['post' => $historia[0]->title]) }}"><h1> <b>{{$historia[0]->title}}</b> </h1></a>
  </div>
  <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
    <div class="row">
      <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
        <a class="ms-2 me-2" href="{{ route('historia.show', ['post' => $historia[1]->title]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$historia[1]->image}}')">
          <h5> <b>{{$historia[1]->title}}</b> </h5>
        </div>
        </a>
        <a class="ms-2 me-2" href="{{ route('historia.show', ['post' => $historia[3]->title]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$historia[3]->image}}')">
          <h5> <b>{{$historia[3]->title}}</b> </h5>
        </div>
        </a>
      </div>
      <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
        <a class="ms-2 me-2" href="{{ route('historia.show', ['post' => $historia[2]->title]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$historia[2]->image}}')">
          <h5> <b>{{$historia[2]->title}}</b> </h5>
        </div>
        </a>
        <a class="ms-2 me-2" href="{{ route('historia.show', ['post' => $historia[4]->title]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$historia[4]->image}}')">
          <h5> <b>{{$historia[4]->title}}</b> </h5>
        </div>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
        @foreach($hobby as $minipost)
            @if($loop->iteration % 2 == 0)
            <div class="row">
              <div class="col-5">
                <div class="mb-2 col-3 w-100 minicolumns d-flex" style="background-image: url('/storage/{{ $minipost->image }}')">
                  <a class="ms-2 me-2 w-100" href="{{ route('hobby.show', ['post' => $minipost->title]) }}"></a>
                </div>
              </div>
              <div class="col-7 minicolumns">
                <a class="ms-2 me-2 w-100" href="{{ route('hobby.show', ['post' => $minipost->title]) }}"><b>{{$minipost->title}}</b></a>
              </div>
            </div>
            @endif
        @endforeach
      </div>
      <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
        @foreach($hobby as $minipost2)
            @if($loop->iteration % 2 != 0)
            <div class="row">
              <div class="col-5">
                <div class="mb-2 col-3 w-100 minicolumns d-flex" style="background-image: url('/storage/{{ $minipost2->image }}')">
                  <a class="ms-2 me-2 w-100" href="{{ route('fakty.show', ['post' => $minipost2->title]) }}"></a>
                </div>
              </div>
              <div class="col-7 minicolumns">
                <a class="ms-2 me-2 w-100" href="{{ route('fakty.show', ['post' => $minipost->title]) }}"><b>{{$minipost2->title}}</b></a>
              </div>
            </div>
            @endif
        @endforeach
      </div>
    </div>

  </div>
  <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 bordercolumns d-flex" style="background-image: url('/storage/{{$historia[5]->image}}')">
    <a href="{{ route('fakty.show', ['post' => $historia[5]->title]) }}"><h1> <b>{{$historia[5]->title}}</b> </h1></a>
  </div>
</div>
@endif

<div class="row pt-4">
  @foreach($kfd as $listpost)
    <div class="col">
      <a href="{{ route('kfd.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($kultura as $listpost)
    <div class="col">
      <a href="{{ route('kultura.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($motoryzacja as $listpost)
    <div class="col">
      <a href="{{ route('motoryzacja.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($naukaitechnologie as $listpost)
    <div class="col">
      <a href="{{ route('naukaitechnologie.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($salonpolityczny as $listpost)
    <div class="col">
      <a href="{{ route('salonpolityczny.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($sluzbymundurowe as $listpost)
    <div class="col">
      <a href="{{ route('sluzbymundurowe.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($spoleczenstwo as $listpost)
    <div class="col">
      <a href="{{ route('spoleczenstwo.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($sport as $listpost)
    <div class="col">
      <a href="{{ route('sport.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @foreach($turystyka as $listpost)
    <div class="col">
      <a href="{{ route('turystyka.show', ['post' => $listpost->title]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->category[0] }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>





<div class="row pt-5">
  <div class="col-4 bottomleft d-flex flex-column justify-content-center">
      <div class="">
        <h5>Publikuj własne artykuły!</h5>
      </div>
      <div class="">
        <a href="/user/register"> <button type="button" class="btn btn-primary"> ZARTEJESTRUJ SIĘ </button> </a>
      </div>
  </div>
  <div class="pt-1 col-4 bottommiddle d-flex flex-column text-center">
    Oferujemy Państwu rozbudowany interfejs publikacji tekstów. Oprócz możliwości formatowania tekstu, pozwala zamieszczać zdjęcia, ciekawe filmiki a czytelnicy mogą komentować zamieszczony artykuł. <a class="text-primary" href="#">czytaj więcej...</a>
  </div>
  <div class="col-4 bottomright d-flex flex-column justify-content-center">
    <div class="">
      <h5>Jeśli masz już konto</h5>
    </div>
    <div class="">
      <a href="/user/register"> <button type="button" class="btn btn-danger"> ZALOGUJ SIĘ </button> </a>
    </div>
  </div>
</div>

<div class="row  ads pt-3 pb-4">
  <div class="col w-100 text-center">
  REKLAMA
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5476273745604280"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-5476273745604280"
     data-ad-slot="8175158206"
     data-adtest="on"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>
</div>

@endsection
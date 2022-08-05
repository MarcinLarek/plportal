@extends('layouts.navbar.plportal')
@section('mainpage')
<div class="row ads">
  <div class="col w-100 text-center">
  <!-- REKLAMA -->
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


<div class="row">
    <div class="col-xl-8 col-l-8 col-md-12 col-sm-12 ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                  @if(isset($firstpost))
                    <img src="/storage/{{ $firstpost->image }}" class="carouselphoto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('post.show', ['post' => $firstpost, 'section' => $firstpost->getsection()]) }}"><h5>{{$firstpost->title}}</h5></a>
                    </div>
                    @endif
                </div>

                @foreach ($posts as $post)
                @break($loop->iteration == 5)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image }}" class="carouselphoto" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><h5>{{$post->title}}</h5></a>
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

            <div class="carousel-indicators">
                @if(isset($firstpost))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                  <img src="/storage/{{$firstpost->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[0]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2">
                  <img src="/storage/{{$posts[0]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[1]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3">
                  <img src="/storage/{{$posts[1]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[2]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4">
                  <img src="/storage/{{$posts[2]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
                @if(isset($posts[3]))
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5">
                  <img src="/storage/{{$posts[3]->image}}" class="d-block w-100 img-fluid" alt="">
                </button>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-l-4 col-md-12 col-sm-12 col-12">
        @foreach ($posts as $post)
        @continue($loop->iteration < 16) @break($loop->iteration == 23)
        @if($loop->iteration < 18)
        <div class="row pt-1">
            <div class="col-xl-5 col-l-5 col-md-5 col-sm-5 col-5 col-12">
                <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><img src="/storage/{{ $post->image }}" class="w-100 rightlistphoto"></a>
            </div>
            <div class="col-xl-7 col-l-7 col-md-7 col-sm-7 col-7 col-12 rightlisttext">
                <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"><b>{{$post->title}}</b></a>
                <p>{{strip_tags(substr($post->postcontent, 0, 100))}}...</p>
            </div>
        </div>
        @else
        <div class="row pt-1">
          <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">• {{$post->title}}</a>
        </div>
        @endif
        @endforeach
    </div>
</div>


<div class="row pt-3">
  @if(isset($firstpost))
  <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 bordercolumns d-flex" style="background-image: url('/storage/{{$firstpost->image}}')">
    <a href="{{ route('post.show', ['post' => $firstpost, 'section' => $firstpost->getsection()]) }}"><h1> <b>{{$firstpost->title}}</b> </h1></a>
  </div>
  @endif
  <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
    <div class="row">
      <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
        @if(isset($posts[1]))
        <a class="ms-2 me-2" href="{{ route('post.show', ['post' => $posts[1], 'section' => $posts[1]->getsection()]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$posts[1]->image}}')">
          <h5> <b>{{$posts[1]->title}}</b> </h5>
        </div>
        </a>
        @endif
        @if(isset($posts[3]))
        <a class="ms-2 me-2" href="{{ route('post.show', ['post' => $posts[3], 'section' => $posts[3]->getsection()]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$posts[3]->image}}')">
          <h5> <b>{{$posts[3]->title}}</b> </h5>
        </div>
        </a>
        @endif
      </div>
      <div class="col-xl-6 col-l-6 col-md-12 col-sm-12">
        @if(isset($posts[2]))
        <a class="ms-2 me-2" href="{{ route('post.show', ['post' => $posts[2], 'section' => $posts[2]->getsection()]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$posts[2]->image}}')">
          <h5> <b>{{$posts[2]->title}}</b> </h5>
        </div>
        </a>
        @endif
        @if(isset($posts[4]))
        <a class="ms-2 me-2" href="{{ route('post.show', ['post' => $posts[4], 'section' => $posts[4]->getsection()]) }}">
        <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{$posts[4]->image}}')">
          <h5> <b>{{$posts[4]->title}}</b> </h5>
        </div>
        </a>
        @endif
      </div>
    </div>

  </div>
@if(isset($posts[5]))
  <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 bordercolumns d-flex" style="background-image: url('/storage/{{$posts[5]->image}}')">
    <a class="ms-2 me-2" href="{{ route('post.show', ['post' => $posts[5], 'section' => $posts[5]->getsection()]) }}">
    <h1> <b>{{$posts[5]->title}}</b> </h1>
    </a>
  </div>
@endif
  <div class="row">
    <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
      @foreach($posts as $minipost)
        @continue($loop->iteration < 7) @break($loop->iteration == 13)
          <div class="row">
            <div class="col-6">
              <div class="mb-2 col-3 w-100 minicolumns d-flex" style="background-image: url('/storage/{{ $minipost->image }}')">
                <a class="ms-2 me-2 w-100" href="{{ route('post.show', ['post' => $minipost, 'section' => $minipost->getsection()]) }}"></a>
              </div>
            </div>
            <div class="col-6 minicolumns">
              <a class="ms-2 me-2 w-100" href="{{ route('post.show', ['post' => $minipost, 'section' => $minipost->getsection()]) }}"><b>{{$minipost->title}}</b></a>
              <p>
                {{strip_tags(substr($minipost->postcontent, 0, 100))}}...
              </p>
            </div>
          </div>
      @endforeach
    </div>
    <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
      @foreach($posts as $minipost2)
        @continue($loop->iteration < 13) @break($loop->iteration == 19)
          <div class="row">
            <div class="col-6">
              <div class="mb-2 col-3 w-100 minicolumns d-flex" style="background-image: url('/storage/{{ $minipost2->image }}')">
                <a class="ms-2 me-2 w-100" href="{{ route('post.show', ['post' => $minipost2, 'section' => $minipost2->getsection()]) }}"></a>
              </div>
            </div>
            <div class="col-6 minicolumns">
              <a class="ms-2 me-2 w-100" href="{{ route('post.show', ['post' => $minipost2, 'section' => $minipost2->getsection()]) }}"><b>{{$minipost2->title}}</b></a>
              <p>
                {{strip_tags(substr($minipost2->postcontent, 0, 100))}}...
              </p>
            </div>
          </div>
      @endforeach
    </div>
    <div class="col-xl-4 col-l-4 col-md-12 col-sm-12">
      @foreach($posts as $minipost)
        @continue($loop->iteration < 19)
          <div class="row">
            <div class="col-6">
              <div class="mb-2 col-3 w-100 minicolumns d-flex" style="background-image: url('/storage/{{ $minipost->image }}')">
                <a class="ms-2 me-2 w-100" href="{{ route('post.show', ['post' => $minipost, 'section' => $minipost->getsection()]) }}"></a>
              </div>
            </div>
            <div class="col-6 minicolumns">
              <a class="ms-2 me-2 w-100" href="{{ route('post.show', ['post' => $minipost, 'section' => $minipost->getsection()]) }}"><b>{{$minipost->title}}</b></a>
              <p>
                {{strip_tags(substr($minipost->postcontent, 0, 100))}}...
              </p>
            </div>
          </div>
      @endforeach
    </div>
  </div>

</div>

<div class="row pt-4">
  @if(count($fakty)>0)
  <h5> <b>Fakty</b> </h5>
  <hr>
  @endif
  @foreach($fakty as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($biznes)>0)
  <h5> <b>Biznes</b> </h5>
  <hr>
  @endif
  @foreach($biznes as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($sport)>0)
  <h5> <b>Sport</b> </h5>
  <hr>
  @endif
  @foreach($sport as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($salonpolityczny)>0)
  <h5> <b>Salon Polityczny</b> </h5>
  <hr>
  @endif
  @foreach($salonpolityczny as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($kfd)>0)
  <h5> <b>Kobieta, Facet, Dziecko</b> </h5>
  <hr>
  @endif
  @foreach($kfd as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($hobby)>0)
  <h5> <b>Hobby</b> </h5>
  <hr>
  @endif
  @foreach($hobby as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($kultura)>0)
  <h5> <b>Kultura</b> </h5>
  <hr>
  @endif
  @foreach($kultura as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($motoryzacja)>0)
  <h5> <b>Motoryzacja</b> </h5>
  <hr>
  @endif
  @foreach($motoryzacja as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($naukaitechnologie)>0)
  <h5> <b>Nauka i Technologie</b> </h5>
  <hr>
  @endif
  @foreach($naukaitechnologie as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($historia)>0)
  <h5> <b>Historia</b> </h5>
  <hr>
  @endif
  @foreach($historia as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($slubzbymundurowe)>0)
  <h5> <b>Służby Mundurowe</b> </h5>
  <hr>
  @endif
  @foreach($slubzbymundurowe as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($turystyka)>0)
  <h5> <b>Turystyka</b> </h5>
  <hr>
  @endif
  @foreach($turystyka as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
        </div>
      </div>
      <b>{{$listpost->title}}</b>
      </a>
    </div>
  @endforeach
</div>

<div class="row pt-4">
  @if(count($spoleczenstwo)>0)
  <h5> <b>Społeczeństwo</b> </h5>
  <hr>
  @endif
  @foreach($spoleczenstwo as $listpost)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 squarecolumns d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
        <div class="pt-1 pb-1 ps-2 pe-2" style="background: #e63b02;">
          {{ $listpost->getmaincategory()->category }}
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
  <!-- REKLAMA -->
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

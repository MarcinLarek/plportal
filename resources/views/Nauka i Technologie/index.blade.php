@extends('layouts.navbar.'.$section)
@section('mainpage')
<div class="row pt-2"><!--Without subs-->
  <h3> <b> Najnowsze </b> </h3>
  @foreach($posts as $listpost)
    @break($loop->iteration == 4)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 naukathreepostsection d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
      </div>
      </a>
      <div class="row">
        <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
        <b>{{$listpost->title}}</b>
        </a>
      </div>
      <div class="row">
        <p>{{strip_tags(substr($listpost->postcontent, 0, 100))}}</p>
      </div>
      <div class="row text-center text-primary">
        <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
        <b>Czytaj dalej</b>
        </a>
      </div>
    </div>
  @endforeach
  <div class="text-center mt-4">
    <form id="search" action="{{ route('post.serach',['section' => $section] ) }}" method="post">
      @csrf
      <input type="hidden" name="serach" value="">
      <input type="submit" class="btn btn-primary" value="WIĘCEJ">
    </form>
  </div>
</div>

<div class="row pt-2"><!--Nine posts -->
<h3> <b>NAUKA</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTUpreg_replace('/\s+/', '', $nauka->category)" role="tablist">
    @foreach($nauka->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTUpreg_replace('/\s+/', '', $nauka->category)Content">
    @foreach($nauka->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(9); ?>
        <div class="row">
          <div class="col-6">
            @if(isset($innerposts[0]))
            <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
            <div class="naukafisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><b>{{$innerposts[0]->title}}</b> </a></p>
            <p>{{strip_tags(substr($innerposts[0]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[1]))
            <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[1]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}"><b>{{$innerposts[1]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[1]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[2]))
            <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[2]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}"><b>{{$innerposts[2]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[2]->postcontent, 0, 100))}}</p>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach($innerposts as $inpost)
            @continue($loop->iteration < 4)
              @if(isset($inpost))
              <div class="col-2 pb-2">
                <div class="naukabottomtabeimage" style="background-image: url('/storage/{{ $inpost->image }}')">
                </div>
              </div>
              <div class="col-2 pb-2">
                <b>{{$inpost->title}}</b>
              </div>
              @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $nauka, 'section' => $nauka->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

<div class="row pt-2"><!--Three posts -->
<h3> <b>NAUKI ŚCISŁE</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $naukiscisle->category)}}" role="tablist">
    @foreach($naukiscisle->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $naukiscisle->category)}}Content">
    @foreach($naukiscisle->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(3); ?>
        <div class="row">
            @if(isset($innerposts))
              @foreach($innerposts as $innerpost)
                <div class="col-4">
                  <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                    <div class="naukathreepostsection" style="background-image: url('/storage/{{ $innerpost->image }}')">
                    </div>
                  </a>
                  <p>
                    <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                      <b>{{$innerpost->title}}</b>
                    </a>
                  </p>
                  <p>{{strip_tags(substr($innerpost->postcontent, 0, 100))}}</p>
                  <div class="row text-center text-primary">
                    <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                    <b>Czytaj dalej</b>
                    </a>
                  </div>
                </div>
              @endforeach
            @endif
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $naukiscisle, 'section' => $naukiscisle->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

<div class="row pt-2"><!--Nine posts -->
<h3> <b>TECHNOLOGIE</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $technologie->category)}}" role="tablist">
    @foreach($technologie->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $technologie->category)}}Content">
    @foreach($technologie->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(9); ?>
        <div class="row">
          <div class="col-6">
            @if(isset($innerposts[0]))
            <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
            <div class="naukafisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><b>{{$innerposts[0]->title}}</b> </a></p>
            <p>{{strip_tags(substr($innerposts[0]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[1]))
            <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[1]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}"><b>{{$innerposts[1]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[1]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[2]))
            <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[2]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}"><b>{{$innerposts[2]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[2]->postcontent, 0, 100))}}</p>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach($innerposts as $inpost)
            @continue($loop->iteration < 4)
              @if(isset($inpost))
              <div class="col-2 pb-2">
                <div class="naukabottomtabeimage" style="background-image: url('/storage/{{ $inpost->image }}')">
                </div>
              </div>
              <div class="col-2 pb-2">
                <b>{{$inpost->title}}</b>
              </div>
              @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $technologie, 'section' => $technologie->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

<div class="row pt-2"><!--Three posts -->
<h3> <b>TECHNIKA WOJSKOWA</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $technikawosjkowa->category)}}" role="tablist">
    @foreach($technikawosjkowa->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $technikawosjkowa->category)}}Content">
    @foreach($technikawosjkowa->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(3); ?>
        <div class="row">
            @if(isset($innerposts))
              @foreach($innerposts as $innerpost)
                <div class="col-4">
                  <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                    <div class="naukathreepostsection" style="background-image: url('/storage/{{ $innerpost->image }}')">
                    </div>
                  </a>
                  <p>
                    <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                      <b>{{$innerpost->title}}</b>
                    </a>
                  </p>
                  <p>{{strip_tags(substr($innerpost->postcontent, 0, 100))}}</p>
                  <div class="row text-center text-primary">
                    <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                    <b>Czytaj dalej</b>
                    </a>
                  </div>
                </div>
              @endforeach
            @endif
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $technikawosjkowa, 'section' => $technikawosjkowa->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

<div class="row pt-2"> <!--Without subs-->
  <h3> <b> INNOWACYJNE TECHNOLOGIE W GOSPODARCE </b> </h3>
  @foreach($innowtechwgosp as $listpost)
    @break($loop->iteration == 4)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 naukathreepostsection d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
      </div>
      </a>
      <div class="row">
        <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
        <b>{{$listpost->title}}</b>
        </a>
      </div>
      <div class="row">
        <p>{{strip_tags(substr($listpost->postcontent, 0, 100))}}</p>
      </div>
      <div class="row text-center text-primary">
        <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
        <b>Czytaj dalej</b>
        </a>
      </div>
    </div>
  @endforeach
</div>

<div class="row pt-2"><!--Nine posts -->
<h3> <b>MEDYCYNA</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $medycyna->category)}}" role="tablist">
    @foreach($medycyna->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $medycyna->category)}}Content">
    @foreach($medycyna->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(9); ?>
        <div class="row">
          <div class="col-6">
            @if(isset($innerposts[0]))
            <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
            <div class="naukafisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><b>{{$innerposts[0]->title}}</b> </a></p>
            <p>{{strip_tags(substr($innerposts[0]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[1]))
            <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[1]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}"><b>{{$innerposts[1]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[1]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[2]))
            <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[2]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}"><b>{{$innerposts[2]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[2]->postcontent, 0, 100))}}</p>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach($innerposts as $inpost)
            @continue($loop->iteration < 4)
              @if(isset($inpost))
              <div class="col-2 pb-2">
                <div class="naukabottomtabeimage" style="background-image: url('/storage/{{ $inpost->image }}')">
                </div>
              </div>
              <div class="col-2 pb-2">
                <b>{{$inpost->title}}</b>
              </div>
              @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $medycyna, 'section' => $medycyna->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

<div class="row pt-2"><!--Three posts -->
<h3> <b>GRY</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $gry->category)}}" role="tablist">
    @foreach($gry->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $gry->category)}}Content">
    @foreach($gry->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(3); ?>
        <div class="row">
            @if(isset($innerposts))
              @foreach($innerposts as $innerpost)
                <div class="col-4">
                  <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                    <div class="naukathreepostsection" style="background-image: url('/storage/{{ $innerpost->image }}')">
                    </div>
                  </a>
                  <p>
                    <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                      <b>{{$innerpost->title}}</b>
                    </a>
                  </p>
                  <p>{{strip_tags(substr($innerpost->postcontent, 0, 100))}}</p>
                  <div class="row text-center text-primary">
                    <a href="{{ route('post.show', ['post' => $innerpost, 'section' => $innerpost->getsection()]) }}">
                    <b>Czytaj dalej</b>
                    </a>
                  </div>
                </div>
              @endforeach
            @endif
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $gry, 'section' => $gry->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

<div class="row pt-2"><!--Nine posts -->
<h3> <b>OCHRONA ŚRODOWISKA</b> </h3>
<hr>
<div class="row">
  <ul class="nav nav-tabs" id="TUTU{{preg_replace('/\s+/', '', $ochronasrodowiska->category)}}" role="tablist">
    @foreach($ochronasrodowiska->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{preg_replace('/\s+/', '', $sub->category)}}" data-bs-toggle="tab" data-bs-target="#home{{preg_replace('/\s+/', '', $sub->category)}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{preg_replace('/\s+/', '', $sub->category)}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTU{{preg_replace('/\s+/', '', $ochronasrodowiska->category)}}Content">
    @foreach($ochronasrodowiska->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @else
      <div class="tab-pane fade" id="home{{preg_replace('/\s+/', '', $sub->category)}}" role="tabpanel" aria-labelledby="home-tab{{preg_replace('/\s+/', '', $sub->category)}}">
        @endif
        <?php $innerposts = $sub->getposts()->take(9); ?>
        <div class="row">
          <div class="col-6">
            @if(isset($innerposts[0]))
            <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}">
            <div class="naukafisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[0], 'section' => $innerposts[0]->getsection()]) }}"><b>{{$innerposts[0]->title}}</b> </a></p>
            <p>{{strip_tags(substr($innerposts[0]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[1]))
            <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[1]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[1], 'section' => $innerposts[1]->getsection()]) }}"><b>{{$innerposts[1]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[1]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[2]))
            <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}">
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[2]->image }}')">
            </div>
            </a>
            <p> <a href="{{ route('post.show', ['post' => $innerposts[2], 'section' => $innerposts[2]->getsection()]) }}"><b>{{$innerposts[2]->title}}</b></a> </p>
            <p>{{strip_tags(substr($innerposts[2]->postcontent, 0, 100))}}</p>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach($innerposts as $inpost)
            @continue($loop->iteration < 4)
              @if(isset($inpost))
              <div class="col-2 pb-2">
                <div class="naukabottomtabeimage" style="background-image: url('/storage/{{ $inpost->image }}')">
                </div>
              </div>
              <div class="col-2 pb-2">
                <b>{{$inpost->title}}</b>
              </div>
              @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
  <div class="row text-center mt-4 mb-4">
    <a href="{{ route('post.category', ['category' => $ochronasrodowiska, 'section' => $ochronasrodowiska->getsection()]) }}">
      <button type="button" class="btn btn-primary">WIĘCEJ</button>
    </a>
  </div>
</div>

@endsection

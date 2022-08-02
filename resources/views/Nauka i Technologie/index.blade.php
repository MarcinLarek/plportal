@extends('layouts.navbar.'.$section)
@section('mainpage')
<div class="row">
  <h5> <b> Wiadomości </b> </h5>
  @foreach($posts as $listpost)
    @break($loop->iteration == 4)
    <div class="col">
      <a href="{{ route('post.show', ['post' => $listpost, 'section' => $listpost->getsection()]) }}">
      <div class="mb-2 col-3 w-100 naukafirstsection d-flex" style="background-image: url('/storage/{{ $listpost->image }}')">
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

<div class="row">
<h3> <b>Nauka</b> </h3>
<hr>

<div class="row">
  <ul class="nav nav-tabs" id="TUTU" role="tablist">
    @foreach($nauka->getsubcategories() as $sub)
    @if($loop->iteration == 1)
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link active" id="home-tab{{$sub->category}}" data-bs-toggle="tab" data-bs-target="#home{{$sub->category}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$sub->category}}</button>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <button class="text-dark nav-link" id="home-tab{{$sub->category}}" data-bs-toggle="tab" data-bs-target="#home{{$sub->category}}" type="button" role="tab" aria-controls="home" aria-selected="false">{{$sub->category}}</button>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="TUTUContent">
    @foreach($nauka->getsubcategories() as $sub)
    @if($loop->iteration == 1)
      <div class="tab-pane fade show active" id="home{{$sub->category}}" role="tabpanel" aria-labelledby="home-tab{{$sub->category}}">
        @else
      <div class="tab-pane fade" id="home{{$sub->category}}" role="tabpanel" aria-labelledby="home-tab{{$sub->category}}">
        @endif
        <?php $innerposts = $sub->getposts(); ?>
        <div class="row">
          <div class="col-6">
            @if(isset($innerposts[0]))
            <div class="naukafisttableimage" style="background-image: url('/storage/{{ $innerposts[0]->image }}')">

            </div>
            <p> <b>{{$innerposts[0]->title}}</b> </p>
            <p>{{strip_tags(substr($innerposts[0]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[1]))
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[1]->image }}')">

            </div>
            <p> <b>{{$innerposts[1]->title}}</b> </p>
            <p>{{strip_tags(substr($innerposts[1]->postcontent, 0, 100))}}</p>
            @endif
          </div>
          <div class="col-3">
            @if(isset($innerposts[2]))
            <div class="naukarighttableimage" style="background-image: url('/storage/{{ $innerposts[2]->image }}')">

            </div>
            <p> <b>{{$innerposts[1]->title}}</b> </p>
            <p>{{strip_tags(substr($innerposts[1]->postcontent, 0, 100))}}</p>
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
</div>

<div class="row">

</div>
@endsection

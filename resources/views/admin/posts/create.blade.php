@extends('layouts.app')
@section('content')
@if(auth()->user()->global_privileges==1 || auth()->user()->ifmenages($permissioncheck->id))
<div class="container">
    <div class="pt-4 ">
      <a class="text-primary" href="{{ route('admin.adminlogout') }}"> <b>Wyloguj się</b> </a> <a href="{{route('admin.index')}}" class="text-primary"> <u>Powrót</u> </a>
    </div>
    <form id="search" action="{{route('admin.post.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <fieldset>

            <div class="row pt-2">
                <div class="col-12">
                    <label for="title" class="control-label">Tyutuł artykułu (Wyświetlający się podczas przeglądania strony oraz na szczycie artykułu)</label>
                    <input name="title" id="title" class="form-control" placeholder="Tytuł" value="{{ old('title') }}" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12">
                    <label for="seo" class="control-label">Tytuł dla SEO (Uproszczony, krótki tytuł wyświetlający się w pasku wyszukiwania. Max 100 znaków)</label>
                    <input name="seo" id="seo" class="form-control" placeholder="Seo" value="{{ old('seo') }}" />
                    @error('seo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12">
                    <label for="summary" class="control-label">Zajawka. Kilka kluczowych zdań wyświetlających się pomiędzy zdjęciem artykułu a tytułem. (Opcjonalnie)</label>
                    <textarea name="summary" id="summary" placeholder="Zajawka" class="form-control">{{ old('summary') }}</textarea>
                    @error('summary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="author" class="control-label">Autor:</label>
                    <input name="author" id="author" class="form-control" placeholder="Autor" value="{{ old('author') }}" />
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-12">
                    <label for="source" class="control-label">Źródło:</label>
                    <input name="source" id="source" class="form-control" placeholder="Źródło" value="{{ old('source') }}" />
                    @error('source')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="postcontent" class="control-label">Zawartość posta:</label>
                    <textarea name="postcontent" id="postcontent" class="form-control">{{ old('postcontent') }}</textarea>
                    @error('postcontent')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @include('admin.posts.CKE5')

                </div>
            </div>



            <div class="row pt-4">
                <div class="col-sm-4">
                    <label for="category" class="control-label">Zaznacz kategorie</label>
                    <select size="24" class="form-select col-12" multiple="multiple" name="category[]" id="category">
                      @foreach($category as $cat)
                          <option value="{{$cat->id}}">
                            {{$cat->category }}
                            @if($cat->getparentcategory() != null)
                             --- (podkategoria kategorii {{$cat->getparentcategory()->category}})
                            @endif
                          </option>
                      @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col sm-3">
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Zdjęcie</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="section" value="{{$section}}">
            </div>

            <div class="row justify-content-center text-center">
                <div class="form-group col mt-md-4 pb-5 mb-5">
                    <input type="submit" value="Zapisz" class="btn btn-lg btn-primary" />
                </div>
            </div>

        </fieldset>
    </form>
</div>
@else
<div class="alert alert-danger" role="alert">
  Brak uprawnień do przeglądania strony
</div>
@endif
@endsection

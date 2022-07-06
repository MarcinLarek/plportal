@extends('layouts.app')
@section('content')
<div class="container">
    @if(session()->has('successalert'))
    <div class="alert alert-success">
        <h1>Pomyślnie zapisano dane</h1>
    </div>
    @endif
    <div class="row pb-3">

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Fakty']) }}">
                        <h2>Fakty</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Biznes']) }}">
                        <h2>Biznes</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Sport']) }}">
                        <h2>Sport</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Salon polityczny']) }}">
                        <h2>Salon polityczny</h2>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row pb-3">

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-4 mb-4">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Kobieta facet dziecko']) }}">
                        <h2>Kobieta Facet Dziecko</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Hobby']) }}">
                        <h2>Hobby</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Kultura']) }}">
                        <h2>Kultura</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Motoryzacja']) }}">
                        <h2>Motoryzacja</h2>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row pb-3">

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-4 mb-4">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Nauka i technologie']) }}">
                        <h2>Nauka i Technologie</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Historia']) }}">
                        <h2>Historia</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-4 mb-4">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Sluzby mundurowe']) }}">
                        <h2>Służby Mundurowe</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Turystyka']) }}">
                        <h2>Turystyka</h2>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row pb-3">

        <div class="col-md-3">
            <div href="#" class="card text-center shadow">
                <div class="card-body mt-5 mb-5">
                    <a class="stretched-link" href="{{ route('admin.post.create', ['section' => 'Spoleczenstwo']) }}">
                        <h2>Społeczeństwo</h2>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

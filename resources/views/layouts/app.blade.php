<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/favicon.png">
    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/libs/popperjs.js') }}"></script>
    <script src="{{ asset('/js/libs/bootstrap.js') }}"></script>
{{--    <script src="{{ asset('/js/libs/pinterest.js') }}"></script>--}}
{{--    <script src="{{ asset('/js/libs/twitter_widgets.js') }}"></script>--}}

{{--    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5476273745604280" crossorigin="anonymous"></script>--}}
    @yield("scripts")

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->a
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app2.min.css') }}" rel="stylesheet">
    @yield("styles")

</head>
<body>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v14.0" nonce="sSNJzdRI"></script>
    <div id="app">
      @include('layouts.navbar.main')
        <main>
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>
</html>

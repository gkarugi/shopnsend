<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('/manage/js/manifest.js') }}" defer></script>
    <script src="{{ mix('/manage/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/manage/js/app.js') }}" defer></script>

    <!-- CSS -->
    <link href="{{ mix('/manage/css/bundle.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!!
                json_encode([
                    'csrfToken' => csrf_token(),
                ])
            !!};
    </script>

    @stack('styles')

</head>

    <body class="@yield('bodyClass')">
        @yield('mainLayout')

        @if(old('modal') !== null)
            <script type="application/javascript">
                $(function() {
                    $('.{{ old('modal')}}').modal('show');
                });
            </script>
        @endif

        @stack('scripts')
    </body>
</html>

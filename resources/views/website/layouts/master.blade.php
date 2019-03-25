<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="google-site-verification" content="" />
        <meta name="msvalidate.01" content="" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page_title') | {{ config('app.name', 'Shop and Send') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/web/css/app.css') }}" rel="stylesheet">

        <!-- Favicon -->
        {{--<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">--}}
        {{--<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">--}}
        {{--<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('android-icon-192x192.png') }}">--}}
        {{--<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">--}}
        {{--<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">--}}
        {{--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">--}}
        {{--<link rel="manifest" href="{{ asset('manifest.json') }}">--}}
        {{--<meta name="msapplication-TileColor" content="#ffffff">--}}
        {{--<meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">--}}
        {{--<meta name="theme-color" content="#ffffff">--}}

        <script>
            window.Laravel = {!!
                    json_encode([
                        'csrfToken' => csrf_token(),
                    ])
                !!};
        </script>



        @stack('styles')

    </head>
    <body>

        @yield('mainLayout')

        <!-- Scripts -->
        <script src="{{ mix('/web/js/manifest.js') }}"></script>
        <script src="{{ mix('/web/js/vendor.js') }}"></script>
        <script src="{{ asset('/web/js/app.js') }}"></script>

        @if(session()->has('cartAdd'))
            <script>
                $(window).on('load', function() {
                    console.log('cart');
                    UIkit.offcanvas('#cart-offcanvas').show();
                });
            </script>
        @endif

        @if(session()->has('success'))
            <script>
                UIkit.notification({
                    message: '{{ session()->get('success') }}',
                    status: 'primary',
                    pos: 'top-center',
                    timeout: 5000
                });
            </script>
        @elseif(session()->has('warning'))
            <script>
                UIkit.notification({
                    message: '{{ session()->get('warning') }}',
                    status: 'warning',
                    pos: 'top-center',
                    timeout: 5000
                });
            </script>
        @elseif(session()->has('error'))
            <script>
                UIkit.notification({
                    message: '{{ session()->get('error') }}',
                    status: 'danger',
                    pos: 'top-center',
                    timeout: 5000
                });
            </script>
        @elseif(session()->has('information'))
            <script>
                UIkit.notification({
                    message: '{{ session()->get('information') }}',
                    status: 'primary',
                    pos: 'top-center',
                    timeout: 5000
                });
            </script>
        @endif

        @stack('scripts')
    </body>
</html>

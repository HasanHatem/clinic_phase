<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ $settings->translation->name }}</title>

    <!-- description -->
    <meta name="description" content="{{ $settings->translation->description }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.gstatic.com/s/montserrat/v18/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/' . app()->getLocale() . '_app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="clincphase">

        <header class="header">

            <!-- navbar -->
            <section class="navbar">
                <div class="container">
                    <nav class="flex flex--jc-sb">
                        <div class="logo">
                            <a href="{{ route('welcome') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="" class="img-res">
                            </a>
                        </div>
                        <div class="links">
                            <ul class="flex">
                                <li>
                                    <a href="{{ route('welcome') }}" class="flex {{ Request::path() === '/' ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                                        <span>{{ __('navbar.home') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M10.5,15H8v-3h2.5V9.5h3V12H16v3h-2.5v2.5h-3V15z M19,8v11c0,1.1-0.9,2-2,2H7c-1.1,0-2-0.9-2-2V8c0-1.1,0.9-2,2-2h10 C18.1,6,19,6.9,19,8z M17,8H7v11h10V8z M18,3H6v2h12V3z"/></g></g></svg>
                                        <span>{{ __('navbar.treatments') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact.index') }}" class="flex {{ Request::path() === 'contact' ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/></svg>
                                        <span>{{ __('navbar.contact') }}</span>
                                    </a>
                                </li>

                                <li class="dropdown" data-dropdown>
                                    <a href="#" class="flex" data-dropdown-button>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"/></svg>
                                    </a>

                                    <ul class="dropdown-menu right" data-dropdown-menu>
                                        @foreach (getChangeRouteLink() as $link)
                                            {!! $link !!}
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </section>
            <!--/ navbar -->

            @yield('header')
        </header>

        @yield('content')

        <footer class="footer">
            <div class="container">
                {{-- <div class="row">
                    <div class="width-50">
                        <div class="footer-links">
                            <h4>Clinic Phase Links</h4>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Treatments</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="width-50">

                    </div>
                </div> --}}
                <div class="row">
                    <div class="width-100">
                        <div class="copyrights">
                            <p>
                                &copy; All rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>

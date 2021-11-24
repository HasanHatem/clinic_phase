<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لوحة التحكم</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.gstatic.com/s/inter/v3/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiA.woff2" rel="preload" as="font" crossorigin>

    <!-- Css Files -->
    <link rel="stylesheet" href="{{ mix('css/admin/admin.css') }}">

    @yield('css_files')

</head>
<body>

    <!-- Admin -->
    <div id="admin">

        <!-- Header -->
        <header id="header">

            <!-- Navbar -->
            <nav id="nav">
                <div class="page-wrapper">
                    <div class="navbar flex">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('images/error.png') }}" alt="Control Panel" class="img">
                            </a>
                        </div>

                        <div class="links">
                            <ul class="flex">
                                <li class="dropdown" data-dropdown>
                                    <a href="#" class="flex" data-dropdown-button>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                                        <span>New</span>
                                    </a>

                                    <ul class="dropdown-menu" data-dropdown-menu>
                                        <li>
                                            <a href="{{ route('admin.categories.create') }}">
                                                New Category
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.categories.create') }}">
                                                New Treatment
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.doctors.create') }}">
                                                New Doctor
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.images.create') }}">
                                                New Image
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.users.create') }}">
                                                New User
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('welcome') }}" class="flex" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                    </a>
                                </li>
                                <li class="dropdown" data-dropdown>
                                    <a href="#" class="flex" data-dropdown-button>
                                        <span>{{ auth()->user()->name }}</span>
                                    </a>

                                    <ul class="dropdown-menu right">
                                        <li>
                                            <a href="{{ route('admin.users.edit', ['user' => auth()->user()]) }}">
                                                Edit Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout').submit()">
                                                Logout
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout" style="display: none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ Navbar -->

        </header>
        <!--/ Header -->

        <!-- Main -->
        <main id="main">
            <div class="left">
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="{{ route('admin.index') }}" class="flex {{ Request::path() === 'admin' ? 'active' : '' }}">
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                                </i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>

                        <li class="dropdown {{ Request::path() === 'admin/categories' || Request::is('admin/categories/*') ? 'active' : '' }}" data-left-dropdown>
                            <a href="#" class="flex {{ Request::path() === 'admin/categories' || Request::is('admin/categories/*') ? 'active' : '' }}" data-left-dropdown-button>
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.15 3.4L7.43 9.48c-.41.66.07 1.52.85 1.52h7.43c.78 0 1.26-.86.85-1.52L12.85 3.4c-.39-.64-1.31-.64-1.7 0z"/><circle cx="17.5" cy="17.5" r="4.5"/><path d="M4 21.5h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1z"/></svg>
                                </i>

                                <span>Categories</span>

                                <div class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.categories.index') }}">
                                        <span>All Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.categories.create') }}">
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown {{ Request::path() === 'admin/treatments' || Request::is('admin/treatments/*') ? 'active' : '' }}" data-left-dropdown>
                            <a href="#" class="flex {{ Request::path() === 'admin/treatments' || Request::is('admin/treatments/*') ? 'active' : '' }}" data-left-dropdown-button>
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M10.5,15H8v-3h2.5V9.5h3V12H16v3h-2.5v2.5h-3V15z M19,8v11c0,1.1-0.9,2-2,2H7c-1.1,0-2-0.9-2-2V8c0-1.1,0.9-2,2-2h10 C18.1,6,19,6.9,19,8z M17,8H7v11h10V8z M18,3H6v2h12V3z"/></g></g></svg>
                                </i>

                                <span>Treatments</span>

                                <div class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.treatments.index') }}">
                                        <span>All Treatments</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.treatments.create') }}">
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown {{ Request::path() === 'admin/doctors' || Request::is('admin/doctors/*') ? 'active' : '' }}" data-left-dropdown>
                            <a href="#" class="flex {{ Request::path() === 'admin/doctors' || Request::is('admin/doctors/*') ? 'active' : '' }}" data-left-dropdown-button>
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><rect fill="none" height="24" width="24"/></g><g><g><polygon points="22,9 22,7 20,7 20,9 18,9 18,11 20,11 20,13 22,13 22,11 24,11 24,9"/><path d="M8,12c2.21,0,4-1.79,4-4s-1.79-4-4-4S4,5.79,4,8S5.79,12,8,12z"/><path d="M8,13c-2.67,0-8,1.34-8,4v3h16v-3C16,14.34,10.67,13,8,13z"/><path d="M12.51,4.05C13.43,5.11,14,6.49,14,8s-0.57,2.89-1.49,3.95C14.47,11.7,16,10.04,16,8S14.47,4.3,12.51,4.05z"/><path d="M16.53,13.83C17.42,14.66,18,15.7,18,17v3h2v-3C20,15.55,18.41,14.49,16.53,13.83z"/></g></g></svg>
                                </i>

                                <span>Doctors</span>

                                <div class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.doctors.index') }}">
                                        <span>All Doctors</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.doctors.create') }}">
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown {{ Request::path() === 'admin/images' || Request::is('admin/images/*') ? 'active' : '' }}" data-left-dropdown>
                            <a href="#" class="flex {{ Request::path() === 'admin/images' || Request::is('admin/images/*') ? 'active' : '' }}" data-left-dropdown-button>
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 16V4c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2zm-11-4l2.03 2.71L16 11l4 5H8l3-4zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"/></svg>
                                </i>
                                <span>Gallery</span>
                                <div class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.images.index') }}">
                                        <span>All Images</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.images.create') }}">
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown {{ Request::path() === 'admin/users' || Request::is('admin/users/*') ? 'active' : '' }}" data-left-dropdown>
                            <a href="#" class="flex {{ Request::path() === 'admin/users' || Request::is('admin/users/*') ? 'active' : '' }}" data-left-dropdown-button>
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                                </i>
                                <span>Users</span>
                                <div class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.users.index') }}">
                                        <span>All Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.create') }}">
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('admin.settings.edit') }}" class="flex {{ Request::path() === 'admin/settings' || Request::is('admin/settings/*') ? 'active' : '' }}">
                                <i class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg>
                                </i>
                                <span>
                                    Settings
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="page-wrapper pt-1">

                    @if ($message = Session::get('success'))
                        <div class="row">
                            <div class="width-100">
                                <div class="success">
                                    <p>
                                        {{ $message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($message = Session::get('failed'))
                        <div class="row">
                            <div class="width-100">
                                <div class="failed">
                                    <p>
                                        {{ $message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Title -->
                    <div class="row">
                        <div class="width-100">

                            <div class="title">
                                <h2>
                                    @yield('title')
                                </h2>
                            </div>

                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>
        </main>
        <!--/ Main -->

    </div>
    <!--/ Admin -->

    <!-- Javascript -->
    <script src="{{ mix('js/admin/admin.js') }}" defer></script>
    @yield('js_files')
</body>
</html>

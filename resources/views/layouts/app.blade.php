<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CodeGram</title>
    <link rel="icon" href="/svg/codegram.svg" type="image/icon type">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.js"
        integrity="sha512-kFoMebJcPxdfDstjuwbbJN3q7hQ6O6npC9exDmbTR7HZZUC50s7DKl/MJSiukySAolVrcVmaLRHTmRjwnGCFow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('js/followButton.js') }}"></script>
    {{-- <script>
            // Get the current user's ID from Laravel's authentication system
            const currentUserId = {{ Auth::check() ? Auth::user()->id : 'null' }};
        
            // Use currentUserId in your JavaScript code
        </script> --}}
    <link rel="stylesheet" href="{{ url('css/followButton.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md  navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex ps-5" href="{{ url('/') }}">
                    <div><img src="/svg/codegram.svg" alt="logo"
                            style="height: 25px; border-right: 1px solid #000000" class="pe-3"></div>
                    <div class="ps-3 pt-1">CodeGram</div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                    href="/profile/{{ Auth::user()->id }}" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- <nav>
            <ul>
                <li>
                    <a href="#"><img src="" alt=""></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"><img src="" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="" alt=""></a>
                </li>
            </ul>
        </nav> --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </script>
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
</body>

</html>

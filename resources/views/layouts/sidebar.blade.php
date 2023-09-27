<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse ">
    <div class="position-sticky">
        <div id="icon">
            <a class=" d-flex ps-3 text-dark" href="{{ url('/') }}" style="text-decoration: none">
                <div><img src="/svg/codegram.svg" alt="logo" style="height: 45px; border-right: 1px solid #000000"
                        class="pe-2"></div>
                <div class="ps-2 pt-1" style="font-size: 20px; font-weight: bold">CodeGram</div>
            </a>
        </div>
        @guest
            @if (Route::has('login'))
                <div class="nav-auth">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            @endif

            @if (Route::has('register'))
                <div class="nav-auth">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            @endif
        @else
            <a id="link" href="/" class="home" aria-current="true">
                <div class="items">
                    <img src="{{ asset('icons/home.png') }}" class="me-3"><span>Home</span>
                </div>
            </a>
            <a href="/explore" class=" text-dark">
                <div class="items">
                    <img src="{{ asset('icons/direction.png') }}" class="me-3"><span
                        class="text-dark text-decoration-none">Explore</span>

                </div>
            </a>
            <a href="/search" class=" text-dark">
                <div class="items">
                    <img src="{{ asset('icons/search.png') }}" class=" me-3"><span>Search</span>
                </div>
            </a>
            <a href="/chat" class=" text-dark">
                <div class="items">
                    <img src="{{ asset('icons/message.png') }}" class=" me-3"><span>Chat</span>
                </div>
            </a>
            <a href="/notifications" class=" text-dark">
                <div class="items">
                    <img src="{{ asset('icons/heart.png') }}" class=" me-3"><span>Notification</span>
                    <span class="notification-count" style=" @if (auth()->user()->unreadNotifications()->count() === 0) display:none @endif">
                        {{ auth()->user()->unreadNotifications()->count() }}</span>
                </div>
            </a>
            <a href="/p/create" class="">
                <div class="items">
                    <img src="{{ asset('icons/create.png') }}" alt="" class=" me-3"><span>Create</span>
                </div>
            </a>
            <a href="/profile/{{ Auth::user()->id }}" class="">
                <div class="items">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="rounded-circle me-3"
                        style="height: 24px; width: 24px; object-fit: cover"></i><span>Profile</span>
                </div>
            </a>

        </div>
        <div class="nav-auth" id="logout">
            <a class="text-dark" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                <img src="{{ asset('icons/logout.png') }}" alt="" class="me-3">{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @endguest
</nav>

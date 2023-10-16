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
    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.js"
        integrity="sha512-kFoMebJcPxdfDstjuwbbJN3q7hQ6O6npC9exDmbTR7HZZUC50s7DKl/MJSiukySAolVrcVmaLRHTmRjwnGCFow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/followButton.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/friendButton.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/comment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/resizeImage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sidebarNotify.js') }}"></script> --}}


    {{-- Styles --}}
    <link rel="stylesheet" href="{{ url('css/followButton.css') }}">
    <link rel="stylesheet" href="{{ url('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('css/postCard.css') }}">
    <link rel="stylesheet" href="{{ url('css/friendButton.css') }}">
    <link rel="stylesheet" href="{{ url('css/commentForm.css') }}">
    <link rel="stylesheet" href="{{ url('css/modal.css') }}">
    <link rel="stylesheet" href="{{ url('css/likeButton.css') }}">
    <link rel="stylesheet" href="{{ url('css/chat.css') }}">
    <link rel="stylesheet" href="{{ url('css/notification.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @inertiaHead
    {{-- @auth
    <script>
        var pusher = new Pusher("ec1add393a7b068d96be", {
            cluster: "ap1",
            useTLS: true,
        });
        Pusher.logToConsole = true;
        // Example: Subscribe to a channel and listen for events
        const userId = {{ auth()->user()->id }}; // Assuming you're using Blade templates
        const channel = pusher.subscribe(`user.${userId}`);
    </script>
    @endauth
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

</head>

<body>
    @inertia
    {{-- @include('layouts.sidebar')
    <main class="py-4">
        @yield('content')
    </main>



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
    </script> --}}

</body>

</html>

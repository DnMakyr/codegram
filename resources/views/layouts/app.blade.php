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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.js"
        integrity="sha512-kFoMebJcPxdfDstjuwbbJN3q7hQ6O6npC9exDmbTR7HZZUC50s7DKl/MJSiukySAolVrcVmaLRHTmRjwnGCFow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="{{ asset('js/followButton.js') }}"></script>
    {{-- <script>
            // Get the current user's ID from Laravel's authentication system
            const currentUserId = {{ Auth::check() ? Auth::user()->id : 'null' }};
        
            // Use currentUserId in your JavaScript code
        </script> --}}
    <link rel="stylesheet" href="{{ url('css/followButton.css') }}">
    <link rel="stylesheet" href="{{ url('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('css/postCard.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .list-group-item {

            align-items: center;

            width: 100%;
            padding: 0.75rem 1rem;
            /* Adjust padding as needed */
        }
    </style>

</head>

<body>
    <div id="app">

        @include('layouts.sidebar')
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

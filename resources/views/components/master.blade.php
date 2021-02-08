<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UIRMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    {{-- Chosen Plugin --}}
    <link rel="stylesheet" href="{{ asset('plugin/chosen.min.css') }}">
    <script src="{{ asset('/plugin/chosen.jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{ asset('images/icon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }
    
        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }
    
        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }
    
        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }
    
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }
    
        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }
    
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
    </style>
</head>

<body class="">
    <div id="app">


        <div class="mx-auto bg-blue-800 p-3.5 text-white border-b border-gray-100 shadow">
            <nav class="flex justify-between">
                <div>
                    <h1 class="text-2xl">
                        @auth
                            <a href="/home">UIRMS</a>
                        @else
                            <a href="/">UIRMS</a>
                        @endauth
                    </h1>
                </div>
                <ul class="flex flex-row">
                    {{-- @if (Route::has('login')) --}}
                        @auth
                        <li class="pr-5">
                            <form action="/search" class="text-black" method="POST">
                                @csrf
                                <input type="text" class="w-64 p-1 rounded-lg mr-0" placeholder="Search by..." name="search">
                                <select name="by" id="by" class="w-4 ml-0 p-1">
                                    <option value="publication" selected>By Publication</option>
                                    <option value="user">By User</option>
                                </select>
                            </form>
                        </li>
                        <li class="pr-5"><a href="/explore">Explore</a></li>
                        <li class="pr-5"><a href="{{ route('profile', auth()->user()) }}">Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="outline-none">Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="pr-5" id="navlink"><a href="{{ route('login') }}">Login</a></li>
                        <li class="pr-5"><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    {{-- @endif --}}
                </ul>
            </nav>
        </div>
        
        {{ $slot }}
    </div>
    <script src="http://unpkg.com/turbolinks"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').chosen();
        });
    </script>

    {{-- <script>
        $(document).ready(function(){
            $(" #faculty").change(function(){
                var faculty_id = $(this).val();

                var option = '<option value=""Select a department></option>';
                $.get("{{ route('dropdown') }}", {"faculty_id" : faculty_id}, function(departments){
                    if(departments.length == 0)
                    {

                    }
                    else {
                        jQuery.each(departments, function(index, item){
                            option += '<option value="' + item.id + '">' + item.name + '</option>';
                        });
                    }
                    $("#department_id").html(option);
                });
            });
        });
    </script> --}}
</body>
</html>
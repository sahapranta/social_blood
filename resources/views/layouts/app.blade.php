<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Social Blood :A Platform to share your blood.</title>
    <link rel="manifest" href="{{asset('/manifest.json')}}" />
    <link rel="shortcut icon" href="{{ asset('image/icons/blood.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('image/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('image/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('image/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('image/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('image/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('image/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('image/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('image/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('image/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('image/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('image/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('image/icons/favicon-16x16.png')}}">
    <meta name="copyright"content="Pranta Saha">
    <meta name="language" content="en">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="theme-color" content="#f84d61">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="social_blood">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="msapplication-navbutton-color" content="#f84d61">
    <meta name="msapplication-TileColor" content="#f84d61">
    <meta name="msapplication-TileImage" content="{{ asset('image/icons/ms-icon-144x144.png') }}">
    <meta name="msapplication-config" content="{{asset('browserconfig.xml')}}">
    <meta name="application-name" content="social_blood">
    <meta name="msapplication-tooltip" content="social_blood">
    <meta name="msapplication-starturl" content="/">
        <!-- Tap highlighting  -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link rel="dns-prefetch" href="//foliotek.github.io">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://foliotek.github.io/Croppie/croppie.js" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="https://foliotek.github.io/Croppie/croppie.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{asset('image/blood.svg')}}" alt="blood" width="30" height="30" class="d-inline-block align-top"/>
                    Social Blood
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="btn btn-danger btn-sm rounded-pill mt-2" href="{{route('blood_request.create')}}">Create Request</a>                                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="notificationDropdown" href="#" class="nav-link mt-1 ml-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i>
                                    @if(auth()->user()->notification_count)
                                    <span class="badge badge-pill badge-danger">{{
                                        auth()->user()->notification_count
                                    }}</span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown" style="max-width:230px; overflow-x:hidden;">                                    
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                        <a class="dropdown-item text-wrap" href="{{route('blood_request.show', $notification->data['link'])}}">{{$notification->data['data']}}</a>
                                    @empty
                                    <a class="dropdown-item" href="#">No New Notifications</a>
                                    @endforelse
                                    @if(auth()->user()->notification_count)
                                        <div class="dropdown-divider"></div>                                
                                        <a href="{{route('markAsRead')}}" class="btn btn-outline-primary mr-1 btn-sm float-right">Mark All as Read</a>
                                    @endif
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>                                  
                                    <img src="{{asset('image/user/'.Auth::user()->avatar)}}" alt="blood" width="30" height="30" class="d-inline-block align-top"/>
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('donor.show', Auth::user()->name) }}">{{__('Profile')}}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer mt-auto pt-4 text-center">
        <div class="container">
            <span class="text">Copyright &copy; {{ now()->year }} Social Blood By <a href="https://sahapranta.github.io" target="_blank">Pranta Saha</a></span>
		</div>
	</footer>    
</body>
</html>

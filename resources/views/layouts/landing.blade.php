<!DOCTYPE html>
<html lang="en">
<head>
    <title>Resto</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description" content="Resto HTML5/CSS3 Restaurant Home Page website Template"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{{ asset('img/resto.png') }}}">

    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/carouFredSel.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/easing.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>

    <!--  start header  -->
    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="/"><img src="img/logo.png" alt="Resto" title=""/></a>
            </div>

            <nav>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    @if(Auth::user())
                        <li><a href="/home">Home</a></li>
                    @endif
                    <li><a href="/#menu">Menu</a></li>
                    @if(Auth::user())
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @else
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header><!--  end header  -->
    @yield('content')

    <footer>
        <div class="wrapper">
            <!-- adresse1  -->
            <section class="adress">
                <p>New York Restaurant</p> 
                <p class="location">3926 Anmoore Road<br/>
                New York, NY 10014</p>
                <p class="phone">718-749-1714</p>
            </section>

            <!--  adress2  -->
            <section class="adress">
                <p>France Restaurant</p>
                <p class="location">68, rue  de la Couronne<br/>
                75002 PARIS </p>
                <p class="phone">02.94.23.69.56</p>
            </section>

            <!--  footer navigation  -->
            <section class="footer_nav">
                <nav>
                    <ul>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Careers</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </nav>
            </section>

            <!--  footer copyrights  -->
            <section class="copyrights">
                <img src="img/footer_logo.png" class="footer_logo" alt="" title="">
                <p>© All Rights Reserved 2014.</p>
                <p>Find  More at <a href="http://pixelhint.com" target="_blank">Pixelhint.com</a></p>   
            </section>
        </div>
    </footer><!--  end footer  -->
</body>
</html>
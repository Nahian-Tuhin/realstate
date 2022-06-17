
{{-- @php
$cmsPages = DB::table('cms_pages')
    ->where('status', 1)
    ->select('title', 'slug')
    ->get();
@endphp
@php($email = \App\Models\BusinessSetting::where(['key' => 'mail_config'])->first()->value ?? '') --}}

<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <title> @yield('title', 'IBAS Group')</title>
    <meta charset="UTF-8" />
    <meta name="description" content="IBAS Group" />
    <meta name="keywords" />
    <meta name="author" />
    <link rel="profile" href="#" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="format-detection" content="telephone-no" />
    <link rel="icon" href="{{ URL::asset('') }}images/uploads/fevicon.png" type="image/png" />
    <!-- External Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
     {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- CSS files -->
    <link rel="stylesheet" href="{{ URL::asset('') }}css/plugins.css" />
    <link rel="stylesheet" href="{{ URL::asset('') }}css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::asset('') }}css/style.css" />

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ URL::asset('') }}js/jquery.easy-ticker.min.js"></script>


    @yield('styles')


    <style>
        /* body{background: #eee} */
        .news{width: 160px}
        .news-scroll a{text-decoration: none}
        .dot{height: 6px;width: 6px;margin-left: 3px;margin-right: 3px;margin-top: 2px !important;background-color: rgb(207,23,23);border-radius: 50%;display: inline-block}

    </style>
</head>

<body>

    <header class="header header--blue header--top">
        <div class="container">
            <!-- .topbar__contact -->
            <!-- .topbar -->
            <div class="header__main">
                <div class="header__logo">

                    <a href="{{ url('/') }}">
                        @if (request()->routeIs('alamin'))
                        <h1 class="screen-reader-text">Al Amin Corner Contracting</h1>
                        <img src="{{ URL::asset('') }}images/uploads/al_amin_light.png" alt="Al Amin Corner Contracting">
                        @elseif (request()->routeIs('fullpower'))
                        <h1 class="screen-reader-text">Full Power Electromechanical Contracting Co. </h1>
                        <img src="{{ URL::asset('') }}images/uploads/full_power_light.png" alt="Full Power Electromechanical Contracting Co.">
                        @elseif (request()->routeIs('crownvalley'))
                        <h1 class="screen-reader-text">Crown Valley Genral Contracting</h1>
                        <img src="{{ URL::asset('') }}images/uploads/Crown_light.png" alt="Crown Valley Genral Contracting">
                        @elseif (request()->routeIs('trustfamous'))
                        <h1 class="screen-reader-text">Trust Famous Real Estate</h1>
                        <img src="{{ URL::asset('') }}images/uploads/trust_famous_light.png" alt="Trust Famous Real Estate">
                        @else
                        <h1 class="screen-reader-text">IBAS Group</h1>
                        <img src="{{ URL::asset('') }}images/uploads/logo_new_light.png" alt="IBAS Group Logo">
                        @endif
                    </a>

                </div>
                <!-- .header__main -->
                <div class="nav-mobile">
                    <a href="#" class="nav-toggle">
                        <span></span>
                    </a>
                    <!-- .nav-toggle -->
                </div>
                <!-- .nav-mobile -->
                <div class="header__menu header__menu--v1">
                    <ul class="header__nav">
                        <li class="header__nav-item">
                            <a href="{{ url('/') }}" class="header__nav-link">HOME</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ url('/about') }}" class="header__nav-link">ABOUT US</a>
                        </li>
                        {{-- <li class="header__nav-item">
                            <a href="" class="header__nav-link">Properties</a>
                        </li> --}}

                        {{-- @foreach ($cmsPages as $page)
                            <li class="header__nav-item">
                                <a href="http://localhost:8000/{{ $page->slug }}" class="header__nav-link">
                                    {{ $page->title }}</a>
                            </li>
                        @endforeach --}}


                        <li class="header__nav-item">
                            <a href="#" class="header__nav-link">MEP CONTRACTING </a>
                            <ul>
                                <li><a href="{{ url('/about') }}">Ibrahim Al Saffar General Cont.</a></li>
                                <li><a href="{{ url('/alamin') }}">Al Amin Corner Cont.</a></li>
                                <li><a href="{{ url('/fullpower') }}">Full Power Electromechanic al Cont.LLC.</a></li>
                                <li><a href="{{ url('/crownvalley') }}">Crown Valley General Cont.</a></li>
                                @forelse ( footerlink2() as $item)
                                <li><a href="{{ route('latest_mep',$item->slug) }}">{{ $item->title }} </a></li>
                            @empty
                                @endforelse
                            </ul>
                        </li>
                        <li class="header__nav-item">
                            <a href="" class="header__nav-link">REAL ESTATE</a>
                            <ul>
                                <li><a href="{{ url('trustfamous') }}">About Trust Famous Real Estate</a></li>
                                <li><a href="{{ url('properties') }}">Property </a></li>
                            </ul>
                        </li>
                        <li class="header__nav-item"><a href="images/profile.pdf" target="_blank" class="header__nav-link">Company Profile</a></li>

                        <li class="header__nav-item"><a href="{{ url('contact') }}" class="header__nav-link">Contac
                                Us</a></li>
                    </ul>
                    <!-- .header__nav -->
                </div>
                <!-- .header__menu -->
            </div>
            <!-- .header__main -->
        </div>
        <!-- .container -->
    </header>
    <!-- .header -->
    @if (isset($page_file_name) && $page_file_name == 'index')
        @include('frontend.partials.slider')
    @endif


                @if(session('success_mail'))
                <div class="alert alert-success">
                    <button type='button' class='close btn-lg' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden="true">x</span>
                    </button>
                {{ session('success_mail') }}
                </div>
                @endif
                @if(session('status1'))
                <div class="alert alert-danger">
                    <button type='button' class='close btn-lg' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden="true">x</span>
                    </button>
                {{ session('status1') }}
                </div>
                @endif
                @if ($errors->any())
                @foreach ($errors->all() as $error)

                <div class="alert alert-danger">
                <button type='button' class='close btn-lg' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden="true">x</span>
                </button>
                {{ $error }}
                </div>
                @endforeach
                @endif

    @yield('content')
























      <footer class="footer">
        <div class="footer__links">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-4 footer__links-single">
                        <h3 class="footer__title">Contact Us</h3>
                        <ul class="footer__list">
                            <li><span class="footer--highlighted">Address:</span> <a href="#">Hazza Bin Zayed Road.
                                    Office No: M1,
                                    <br />
                                    Bld. No: 725, Malek Sayed Yousuf Kabil Building.<br />
                                    Opposite Building of Grand Millennium & Al Wahda Mall,<br />
                                    P.O.Box - 72849, Abu Dhabi, U A E,</a></li>
                            <li><span class="footer--highlighted">Email:</span> <a href="#">property@ibasuae.com,
                                mep@ibasuae.com</a></li>
                            <li><span class="footer--highlighted">Phone:</span> <a href="tel:+971501234567">+971 2
                                    6422331, +971 2 6426463</a></li>
                        </ul>
                        <!-- .footer__list -->
                    </div>
                    <!-- .col -->
                    <div class="col-sm-4 col-md-4 footer__links-single">
                        <h3 class="footer__title">Group of Companies</h3>
                        <ul class="footer__list">
                            <li><a href="{{ url('/about') }}">Ibrahim Al Saffar General Cont.</a></li>
                            <li><a href="{{ url('/alamin') }}">Al Amin Corner Cont.</a></li>
                            <li><a href="{{ url('/fullpower') }}">Full Power Electromechanic al Cont.LLC.</a></li>
                            <li><a href="{{ url('/crownvalley') }}">Crown Valley General Cont.</a></li>
                            <li><a href="{{ url('/properties') }}">Trust Famous Real Estate</a></li>
                            @forelse ( footerlink2() as $item)
                            <li><a href="{{ route('latest_mep',$item->slug) }}">{{ $item->title }} </a></li>
                        @empty
                            @endforelse
                        </ul>
                        <!-- .footer__list -->
                    </div>
                    <!-- .col -->
                    <div class="col-sm-4 col-md-4 footer__links-single">
                        <h3 class="footer__title">MEP Services</h3>
                        <ul class="footer__list">


                            @forelse ( footerlink1() as $item)
                                <li><a href="{{ route('latest_mep',$item->slug) }}">{{ $item->title }} </a></li>
                            @empty
                                @endforelse

                        </ul>
                        <!-- .footer__list -->
                    </div>
                    <!-- .col -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .footer__links -->
        <div class="footer__main">
            <div class="container">
                <div class="footer__logo">




                    <a href="{{ url('/') }}">
                        @if (request()->routeIs('alamin'))
                        <h1 class="screen-reader-text">Al Amin Corner Contracting</h1>
                        <img src="{{ URL::asset('') }}images/uploads/al_amin_logo.png" alt="Al Amin Corner Contracting">
                        @elseif (request()->routeIs('fullpower'))
                        <h1 class="screen-reader-text">Full Power Electromechanical Contracting Co. </h1>
                        <img src="{{ URL::asset('') }}images/uploads/full_power_logo.png" alt="Full Power Electromechanical Contracting Co.">
                        @elseif (request()->routeIs('crownvalley'))
                        <h1 class="screen-reader-text">Crown Valley Genral Contracting</h1>
                        <img src="{{ URL::asset('') }}images/uploads/crown_logo.png" alt="Crown Valley Genral Contracting">

                        @elseif (request()->routeIs('trustfamous'))
                        <h1 class="screen-reader-text">Trust Famous Real Estate</h1>
                        <img src="{{ URL::asset('') }}images/uploads/trust_logo.png" alt="Trust Famous Real Estate">

                        @else
                        <h1 class="screen-reader-text">IBAS Group</h1>
                        <img src="{{ URL::asset('') }}images/uploads/logo_new_dark.png" alt="IBAS Group Logo">
                        @endif
                    </a>
                </div>
                <!-- .footer__logo -->
                    <p class="footer__desc">

                        Excellence in MEP Contracting and MEP Maintenance
                </p>

                <ul class="footer__social">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
                <!-- .footer__social -->
            </div>
            <!-- .container -->
        </div>
        <!-- .footer__main -->
        <div class="footer__copyright">
            <div class="container">
                <div class="footer__copyright-inner">
                    <p class="footer__copyright-desc">
                        &copy;2022 <span class="footer--highlighted">IBAS Group. </span>All Right Reserved.
                    </p>

                    <i>
                        WebSite Developed by <a href="https://www.omeganetbd.com/">Omega Net BD</a> </i>

                    <ul class="footer__copyright-list">
                        @forelse ( footerlink3() as $item)
                                <li><a href="{{ route('latest_mep',$item->slug) }}">{{ $item->title }} </a></li>
                            @empty
                                @endforelse


                    </ul>
                </div>
                <!-- .footer__copyright-inner -->
            </div>
            <!-- .container -->
        </div>

    </footer>
    <!-- .footer -->
    <a href="#" class="back-to-top"  style="padding:10px;"><span class="fa fa-arrow-up"></span></a>

    <!-- JS Files -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
    <script src="{{ URL::asset('') }}js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('') }}js/custom.js"></script>
    {{-- <script src="{{ URL::asset('') }}js/jquery-1.12.4.min.js"></script> --}}
    <script src="{{ URL::asset('') }}js/plugins.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> --}}

    <script>


    </script>

    @yield('scripts')
</body>

</html>

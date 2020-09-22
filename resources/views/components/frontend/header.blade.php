    <!-- Start Header Section -->
    <header class="header wow bounceInUp" id="top">
        <nav class="navbar navbar-expand-lg navbar-light wow slideInLeft">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('frontend') }}/img/logo.png" alt="">
                </a>
                <div class="d-flex flex-row order-2 order-lg-3 sm">
                    <a href="{{ route('profile.download') }}" class="btn btn-nav"> <img src="{{ asset('frontend') }}/img/arrow.png" width="20px" height="20px" class="mr-1">
                        <span style="margin-top: 10px;">{{ __('home.Smile_Digital_Profile') }}</span>
                    </a>

                    <ul class="social_media">
                        <li><a href="{{ $staticPages->where('key','facebook')->first()->value ?? '#' }}"><i class="fa fa-facebook"></i></a></li>
                        <li>
                            <a href="{{ $staticPages->where('key','twitter')->first()->value ?? '#' }}"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="{{ $staticPages->where('key','instagram')->first()->value ?? '#' }}"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="{{ $staticPages->where('key','behance')->first()->value ?? '#' }}"><i class="fa fa-behance"></i></a>
                        </li>
                        <li>
                            <a href="{{ $staticPages->where('key','youtube')->first()->value ?? '#' }}"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="{{ $staticPages->where('key','linkedIn')->first()->value ?? '#' }}"><i class="fa fa-linkedin"></i></a>
                        </li>

                    </ul>
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('lang',['lang'=>'ar']) }}">
                                    <img src="{{ asset('frontend') }}/img/ar.png" class="mr-1" alt=""> عربي
                                </a>
                                <a class="dropdown-item" href="{{ route('lang',['lang'=>'en']) }}">
                                    <img src="{{ asset('frontend') }}/img/en.png" class="mr-1" alt=""> English
                                </a>
                                <a class="dropdown-item" href="{{ route('lang',['lang'=>'tr']) }}">
                                    <img src="{{ asset('frontend') }}/img/tr.gif" class="mr-1" alt=""> Türkçe
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->

                    <div class="hamburger-menu">
                        <div class="line line1"></div>
                        <div class="line line2"></div>
                        <div class="line line3"></div>
                    </div>
                </button>

                <div class="collapse navbar-collapse sidebar" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ asset('home') }}">{{ __('home.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">{{ __('home.About_Smile_Degital') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">{{ __('home.Our_Services') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#achievements">{{ __('home.Our_Achievements') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonies">{{ __('home.Testimonies') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#clients">{{ __('home.Our_Clients') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">{{ __('home.Contact_Us') }}</a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>
    </header>

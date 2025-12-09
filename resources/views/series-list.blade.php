<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NOTflix - Series</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Button-Icon-Round.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Content-Filter---CodyHouse-No-cutom-Code.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Filter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu-collapse-ultimate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navBar-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navBar1-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Swipe-Slider-9.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tc-cardhover-14.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
</head>

<body style="background: #21212e; padding-right: 0px">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white transparency border-bottom border-light" id="transmenu" style="height: 72px;">
        <div class="container">
            <a class="navbar-brand text-success" href="{{ route('home') }}" style="padding-top: 0px;padding-bottom: 0px;">
                <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: 2px;padding-top: 8px;height: 63px;width: 173px;" />
            </a>
            <button data-toggle="collapse" class="navbar-toggler collapsed" data-target="#navcol-1">
                <img src="{{ asset('assets/img/icons8-menu-64.png') }}" style="width: 49px;height: 47px;margin-top: -15px;" />
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form action="{{ route('series.index') }}" method="GET">
                    <input type="search" style="border-radius: 24px;width: 238px;height: 34px;border-width: 0px;margin-left: -14px;" name="search_string" />
                    <button class="btn btn-primary d-table-row" type="submit" name="search" style="background: url({{ asset('assets/img/icons8-search-64.png') }}) center / contain no-repeat, rgba(147,3,3,0); height: 40px; box-shadow:0px 0px 0px 0px"></button>
                </form>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#footer" style="color: rgb(255,255,255);">Contact</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" style="color: rgb(255,255,255);">Log out</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('signin') }}" style="color: rgb(255,255,255);">Sign In</a></li>
                    @endauth
                </ul>
                @auth
                    <a class="d-lg-flex justify-content-lg-center align-items-lg-center" href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('user.profile') }}" style="margin-top: 0px;margin-left: 21px;" title="{{ Auth::user()->isAdmin() ? 'Admin Dashboard' : 'View Profile' }}">
                        <span style="color: #fff;">{{ Auth::user()->name }}</span>
                        <img class="border rounded-circle img-profile" src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}'s Avatar" style="width: 50px;height: 50px;object-fit: cover;margin-left: 5px;" />
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Carousel Section -->
    <section id="header" style="margin-bottom: 133px;border-radius: 54px;box-shadow: 0px 7px 20px 4px rgba(189,17,250,0.25), 30px -1px 11px #46c2ff; width:100%;">
        <div id="fw_al_007" class="carousel ps_rotate_scale_c ps_indicators_l ps_control_rotate_f swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#fw_al_007" data-slide-to="0" class="active"></li>
                <li data-target="#fw_al_007" data-slide-to="1"></li>
                <li data-target="#fw_al_007" data-slide-to="2"></li>
                <li data-target="#fw_al_007" data-slide-to="3"></li>
                <li data-target="#fw_al_007" data-slide-to="4"></li>
                <li data-target="#fw_al_007" data-slide-to="5"></li>
                <li data-target="#fw_al_007" data-slide-to="6"></li>
                <li data-target="#fw_al_007" data-slide-to="7"></li>
                <li data-target="#fw_al_007" data-slide-to="8"></li>
                <li data-target="#fw_al_007" data-slide-to="9"></li>
                <li data-target="#fw_al_007" data-slide-to="10"></li>
                <li data-target="#fw_al_007" data-slide-to="11"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First Slide -->
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/wallpapersden.com_star-wars-dark-side_2560x1440.jpg') }}" alt="fw_al_007_01">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Second Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/30Qm6l.gif') }}" alt="fw_al_007_02">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Third Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/tenor.gif') }}" alt="fw_al_007_03">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Fourth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/uw0gHLX.jpg') }}" alt="fw_al_007_04">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Fifth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/joker-joker-2019-movie-joaquin-phoenix-movies-hd-wallpaper-preview.jpg') }}" alt="fw_al_007_05">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Sixth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/KlutzyFemaleArabianoryx-max-14mb.gif') }}" alt="fw_al_007_06">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Seventh Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/13-Reasons-to-watch-13-Reasons-Why-768x514.jpg') }}" alt="fw_al_007_07">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Eighth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/Animation.gif') }}" alt="fw_al_007_08">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Ninth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/Friends.gif') }}" alt="fw_al_007_09">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Tenth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/the-nun-movie-4k-fz.jpg') }}" alt="fw_al_007_10">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Eleventh Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/TheQ.gif') }}" alt="fw_al_007_11">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
                <!-- Twelfth Slide -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/Nemo.gif') }}" alt="fw_al_007_12">
                    <div class="fw_al_007_slide">
                        <h3 data-animation="animated flipInX">NOTflix</h3>
                        <h1 data-animation="animated flipInX"><span>FIND</span> Your Interest</h1>
                        <p data-animation="animated flipInX">Of Movies, Series, Novels and More !</p>
                        <a href="#cards" data-animation="animated flipInX">Start Now !</a>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#fw_al_007" data-slide="prev"></a>
            <a class="carousel-control-next" href="#fw_al_007" data-slide="next"></a>
        </div>
    </section>

    <!-- Tab Filter -->
    <div style="height: 100px;">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <ul class="cd-filters">
                    <li class="placeholder"><a class="selected" href="#0" data-type="all"><strong>All</strong></a></li>
                    <li class="filter"><a href="{{ route('home') }}" data-type="all">Movies</a></li>
                    <li class="filter"><a class="selected" href="{{ route('series.index') }}" data-type="color-1">Series</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <section id="cards">
        <h1 style="margin-bottom: 31px;color: rgba(70,194,255,0.63);font-size: 30px;text-align: center;font-family: 'Architects Daughter', cursive;">Filter Results</h1>
        <div class="filter">
            <form action="{{ route('series.index') }}" method="GET">
                <!-- Language Filter -->
                <select style="margin-bottom:20px; margin-left:10px" name="language">
                    <option value="">Language</option>
                    @foreach($languages as $language)
                        <option value="{{ $language->LANGUAGE }}" {{ request('language') == $language->LANGUAGE ? 'selected' : '' }}>
                            {{ $language->LANGUAGE }}
                        </option>
                    @endforeach
                </select>

                <!-- Genre Filter -->
                <select style="margin-bottom:20px; margin-left:10px" name="genre">
                    <option value="">Genre</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->ID }}" {{ request('genre') == $genre->ID ? 'selected' : '' }}>
                            {{ $genre->GENRE_TYPE }}
                        </option>
                    @endforeach
                </select>

                <!-- Era Filter -->
                <select style="margin-bottom:20px; margin-left:10px" name="era">
                    <option value="">Era</option>
                    @for($year = 1910; $year <= 2020; $year += 10)
                        <option value="{{ $year }}" {{ request('era') == $year ? 'selected' : '' }}>
                            {{ $year }}s
                        </option>
                    @endfor
                </select>

                <!-- Prize Filter -->
                <select style="margin-bottom:20px; margin-left:10px" name="prize">
                    <option value="">Prize</option>
                    @foreach($prizes as $prize)
                        <option value="{{ $prize->ID }}" {{ request('prize') == $prize->ID ? 'selected' : '' }}>
                            {{ $prize->TITLE }} {{ $prize->TYPE_OF_PRIZE }}
                        </option>
                    @endforeach
                </select>

                <div class="d-xl-flex justify-content-xl-center align-items-xl-center block-heading">
                    <button class="btn btn-primary text-center d-xl-flex justify-content-xl-center align-items-xl-center" type="submit" name="show" style="height: 40px;border-radius: 584px;background: #6f38ff;box-shadow: 0px 0px 20px rgba(70,194,255,0.63);border-width: 0px;margin-top: 20px; margin-bottom: 5px;font-color: rgba(70,194,255,0.63);font-size:20px;text-align: center;font-family: 'Architects Daughter', cursive;">Show</button>
                </div>
            </form>
        </div>

        <!-- Series Grid -->
        <div class="row" style="margin-top: 40px;margin-right: 0px; margin-top: 0px; padding: 33px;">
            <!-- Sidebar with Advertisements -->
            <div class="col-md-3">
                @foreach($advertisements->take(7) as $ad)
                    <div class="card" style="margin-top: 60px;">
                        <div class="card-body" style="height: 100%;width: 100%;">
                            <img src="{{ asset('assets/img/' . $ad->PICTURE) }}" style="width: 100%;" alt="Advertisement">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Series Grid -->
            <div class="col-md-9">
                <div class="products">
                    <div class="row no-gutters">
                        @foreach($series as $serie)
                            <div class="col-12 col-md-6 col-lg-4" style="padding: 13px;">
                                <figure class="figure tc-cardhover-14">
                                    <figcaption>
                                        <a href="{{ route('series.show', $serie->ID) }}" rel="stylesheet" type="text/css">
                                            <h3>{{ $serie->NAME_SERIES }}</h3>
                                            <p style="color: white !important; font-size: 12px;">{{ Str::limit($serie->DESCRIPTION, 100) }}</p>
                                        </a>
                                    </figcaption>
                                    <img class="figure-img" src="{{ $serie->POSTER ?? asset('assets/img/91SCNVEssVL._AC_SY741_.jpg') }}" alt="{{ $serie->NAME_SERIES }}">
                                </figure>
                            </div>
                        @endforeach
                    </div>
                    <nav class="d-flex d-sm-flex d-lg-flex justify-content-center justify-content-sm-center justify-content-lg-center">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" style="background: #21212e;">
        <div class="row">
            <div class="col-sm-6 col-md-4 footer-navigation">
                <h3><a href="{{ route('home') }}" style="font-size: 37px;font-family: Cookie, cursive;">NOT&nbsp;&nbsp;<span style="color: rgb(97,154,254);">flix</span></a></h3>
                <p class="links"><a href="{{ route('home') }}">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Contact</a></p>
                <p class="company-name">CMP © 2023</p>
            </div>
            <div class="col-sm-6 col-md-4 footer-contacts">
                <div class="d-lg-flex justify-content-lg-end align-items-lg-end">
                    <img class="d-lg-flex" src="{{ asset('assets/img/icons8-address-64.png') }}">
                    <p class="text-left d-lg-flex justify-content-lg-center align-items-lg-center" style="font-size: 14px;font-family: Montserrat, sans-serif;"> Cairo University Rd, Oula, Giza District </p>
                </div>
                <div class="d-lg-flex align-items-lg-center">
                    <img src="{{ asset('assets/img/icons8-phone-64.png') }}" style="width: 41px;height: 40px;">
                    <p class="d-lg-flex footer-center-info email text-left" style="font-family: Montserrat, sans-serif;margin-left: 23px;margin-top: 7px;"> +1 141992110</p>
                </div>
                <div class="d-flex d-lg-flex align-items-center align-items-lg-center">
                    <img src="{{ asset('assets/img/icons8-envelope-64.png') }}" style="width: 42px;height: 42px;">
                    <p style="margin-top: 7px;margin-left: 0px;"> <a href="#" target="_blank">contact@notflix.com</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 footer-about">
                <h4>About NOTflix</h4>
                <p>Your destination for movies, series, and entertainment</p>
                <div class="d-flex justify-content-center social-links social-icons">
                    <a href="#"><img src="{{ asset('assets/img/icons8-facebook-64.png') }}" style="width: 36px;"></a>
                    <a href="#"><img src="{{ asset('assets/img/icons8-twitter-64.png') }}" style="width: 36px;"></a>
                    <a href="#"><img src="{{ asset('assets/img/icons8-linkedin-64.png') }}" style="width: 36px;"></a>
                    <a href="#"><img src="{{ asset('assets/img/icons8-github-64.png') }}" style="width: 36px;"></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/moviesContainer.js') }}"></script>
    <script src="{{ asset('assets/js/animatedNav.js') }}"></script>
    <script src="{{ asset('assets/js/Swipe-Slider-9.js') }}"></script>
</body>
</html>

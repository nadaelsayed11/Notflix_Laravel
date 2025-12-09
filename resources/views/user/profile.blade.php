<!DOCTYPE html>
<html style="background: rgb(33,33,46);">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>My Profile - NOTflix</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="{{ asset('assets/css/Profile-Card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
</head>

<body id="page-top" style="min-height: 100vh;margin: 0px;padding: 0px;background: rgba(49,23,54,0);display: flex;flex-direction: column;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding: 4px;filter: hue-rotate(9deg);background: rgb(61,5,81);color: rgb(61,5,81);border-color: rgb(226,227,235);">
        <div class="container">
            <a class="navbar-brand logo" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 28px;padding-top: 0px;padding-bottom: 0px;">
                <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: -1px;padding-top: 13px;">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <img src="{{ asset('assets/img/icons8-menu-64.png') }}">
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" style="font-size: 16px;">
                        <a class="nav-link" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="height: 499px;">
        <div class="text-center profile-card" style="margin: 15px;color: #858796;background: rgba(255,255,255,0);border-color: rgba(133,135,150,0);">
            <div style="margin-top: 94px;margin-right: 0px;">
                <div class="row" style="margin-right: 0px;">
                    <div class="col-auto" style="width: 300px;margin-right: 0px;margin-left: 0px;">
                        <img class="img-thumbnail d-xl-flex align-items-xl-start" style="margin-top: 0px;text-align: right;object-fit: cover;" src="{{ $user->avatar_url }}" alt="{{ $user->name }}'s Avatar" width="150px" height="150px">
                    </div>
                    <div class="col-auto" style="margin-top: 30px;">
                        <h3 style="text-align: left;color: rgb(255,255,255);margin-bottom: 12px;font-size: 40px;">{{ $user->name }}</h3>
                        <h3 style="text-align: left;color: rgb(255,255,255);margin: 0px;margin-top: 0px;font-size: 25px;">{{ $user->email }}</h3>
                        <div class="row" style="padding:0;padding-bottom:10px;padding-top:20px;">
                            <div class="col-auto">
                                <button class="btn btn-primary" type="button" style="background: #219bd7;text-align: center;margin-top: 5px;font-size: 20px;" onclick="window.location.href='{{ route('user.edit-profile') }}';">Edit Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-5">
            <div class="container">
                <h1 class="text-center mb-4" style="color: rgb(255,255,255);font-family: Cookie, cursive;font-size: 50px;">Favorites</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="filtr-controls text-center lead text-uppercase mb-3">
                    <span class="active d-inline-block mx-3 py-1 position-relative" data-filter="all" style="color: rgb(255,255,255);font-family: Cookie, cursive;font-size: 30px;">all</span>
                    <span class="d-inline-block mx-3 py-1 position-relative" data-filter="1" style="font-family: Cookie, cursive;font-size: 30px;color: rgb(255,255,255);">movies</span>
                    <span class="d-inline-block mx-3 py-1 position-relative" data-filter="2" style="color: rgb(255,255,255);font-size: 30px;font-family: Cookie, cursive;">series</span>
                </div>

                <div class="row filtr-container">
                    @foreach($favoriteMovies as $movie)
                        <div class="col-md-6 col-lg-4 filtr-item" data-category="1">
                            <div class="card border-dark" style="color: rgb(176,179,204);background: rgba(255,255,255,0);">
                                <div class="card-header text-light" style="background: rgba(90,92,105,0);">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('movie.show', $movie->ID) }}" rel="stylesheet" type="text/css">
                                                <h5 class="m-0" style="font-size: 26px;border-color: rgb(255,255,255);">{{ $movie->NAME_MOVIE }}</h5>
                                            </a>
                                        </div>
                                        <div class="col-auto" style="text-align: right;">
                                            <a href="{{ route('favorites.movie.remove', $movie->ID) }}" rel="stylesheet" type="text/css">
                                                <img src="{{ asset('assets/img/icons8-star-64.png') }}" style="width: 35px;margin-left: 14px;text-align: right;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('movie.show', $movie->ID) }}" rel="stylesheet" type="text/css">
                                    <img class="img-fluid card-img w-100 d-block rounded-0" src="{{ $movie->POSTER ?? asset('assets/img/91SCNVEssVL._AC_SY741_.jpg') }}">
                                </a>
                                <div class="card-body" style="background: radial-gradient(rgb(255,255,255) 0%, white 61%, rgb(151,189,255) 100%), rgb(255,255,255);color: rgb(1,5,41);">
                                    <p class="card-text" style="color: rgb(30,8,58);">{{ Str::limit($movie->DESCRIPTION_OF_MOVIE, 150) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach($favoriteSeries as $serie)
                        <div class="col-md-6 col-lg-4 filtr-item" data-category="2">
                            <div class="card border-dark" style="color: rgb(176,179,204);background: rgba(255,255,255,0);">
                                <div class="card-header text-light" style="background: rgba(90,92,105,0);">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('series.show', $serie->ID) }}" rel="stylesheet" type="text/css">
                                                <h5 class="m-0" style="font-size: 26px;border-color: rgb(255,255,255);">{{ $serie->NAME_SERIES }}</h5>
                                            </a>
                                        </div>
                                        <div class="col-auto" style="text-align: right;">
                                            <a href="{{ route('favorites.series.remove', $serie->ID) }}" rel="stylesheet" type="text/css">
                                                <img src="{{ asset('assets/img/icons8-star-64.png') }}" style="width: 35px;margin-left: 14px;text-align: right;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('series.show', $serie->ID) }}" rel="stylesheet" type="text/css">
                                    <img class="img-fluid card-img w-100 d-block rounded-0" src="{{ $serie->POSTER ?? asset('assets/img/91SCNVEssVL._AC_SY741_.jpg') }}">
                                </a>
                                <div class="card-body" style="background: radial-gradient(rgb(255,255,255) 0%, white 61%, rgb(151,189,255) 100%), rgb(255,255,255);color: rgb(1,5,41);">
                                    <p class="card-text" style="color: rgb(30,8,58);">{{ Str::limit($serie->DESCRIPTION, 150) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <footer id="footer" style="background: rgba(61,5,81,0.9);min-height: 146px;padding: 20px 0;">
            <div class="container">
            <div class="row" style="margin: 0;">
                <div class="col-sm-6 col-md-4 footer-navigation">
                    <h3><a href="{{ route('home') }}" style="font-size: 37px;font-family: Cookie, cursive;">NOT&nbsp;&nbsp;<span style="color: rgb(97,154,254);">flix</span></a></h3>
                    <p class="links"><a href="{{ route('home') }}">Home</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Contact</a></p>
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
            </div>
        </footer>
    </main>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

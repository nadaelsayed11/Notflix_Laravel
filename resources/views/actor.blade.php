<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Actor Page</title>

    {{-- All your CSS imports --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/FontAwesome.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    {{-- Google Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Balsamiq+Sans">

    {{-- Many CSS files from original --}}
    @foreach([
        '--mp---Multiple-items-slider-responsive.css',
        '-Filterable-Gallery-with-Lightbox-BS4-.css',
        '3D-SLIDER-1.css',
        '3D-SLIDER.css',
        'carddd.css',
        'Media-Slider-Bootstrap-3.css',
        'Notflixfooter.css',
        'ReviewCard.css',
        'smoothproducts.css',
        'Swiper-Slider.css',
        'untitled.css'
    ] as $css)
        <link rel="stylesheet" href="{{ asset('assets/css/' . $css) }}">
    @endforeach

</head>

<body style="background: linear-gradient(#bd11fa, #46c2ff);">

{{-- NAVBAR --}}
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding: 4px;filter: hue-rotate(9deg);height: 67px;">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 28px;padding-top: 0px;padding-bottom: 0px;"><img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: -1px;padding-top: 13px;height: 60px"></a>

        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <img src="{{ asset('assets/img/icons8-menu-64.png') }}" style="height: 50px">
        </button>

        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" style="font-size: 16px;">
                    <a class="nav-link active" href="{{ url('/movies') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link active" href="#footer" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('logout') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Log out</a></li>
            </ul>

            {{-- User --}}
            @if($user)
            <a class="d-flex justify-content-lg-center align-items-lg-center" href="{{ $user->type === 'admin' ? url('/admin') : url('/user') }}" style="margin-top: 0px;margin-left: 0px;">
                <span class="d-flex align-items-center" style="font-family: Acme, sans-serif;font-size: 18px;color: rgba(255,255,255,0.9);">{{ $user->name }}
                    @if($user->image)
                    <img class="border rounded-circle img-profile" src="{{ asset('assets/user_pics/' . $user->image) }}" style="width: 50px;margin-left: 5px;" onerror="this.src='{{ asset('assets/img/default-user.png') }}'">
                    @endif
                </span>
            </a>
            @endif
        </div>
    </div>
</nav>

<main class="page product-page" style="color: white;font-size: 24px;padding-top: 70px;background: linear-gradient(#bd11fa, #46c2ff);min-height: 100vh;">
    <section class="clean-block clean-product dark" style="padding-bottom: 50px;">
        <div class="container">

            <div class="d-xl-flex justify-content-xl-center align-items-xl-center block-heading">
                <button class="btn btn-primary text-center d-xl-flex justify-content-xl-center align-items-xl-center" data-bs-hover-animate="pulse" type="button" style="height: 104px;border-radius: 584px;background: rgb(33,33,46);box-shadow: 0px 0px 20px rgb(33,33,46);border-width: 0px;border-bottom: 0px none rgba(0,123,255,0);margin-bottom: 35px;margin-top: 10px;">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: 11px;filter: hue-rotate(17deg);">
                    </a>
                </button>
            </div>

            <div class="block-content" style="background: rgb(33,33,46);box-shadow: 0px 0px 60px rgb(45,45,68);">

                {{-- Actor Info --}}
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery" style="background: rgba(135,73,237,0.32);box-shadow: inset 0px 0px 17px #af5eee;overflow: hidden;">
                                <a href=""><img src="{{ $actor->IMAGE ? asset($actor->IMAGE) : asset('assets/img/actor_pic_not_available.jpg') }}" style="width: 100%;height: 100%;display: block;"></a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info">
                                <h4 style="font-family: Acme;font-size: 32px;margin-bottom: 30px;">
                                    {{ $actor->FNAME }} {{ $actor->LNAME }}
                                </h4>

                                <h4 class="text-info">Birth Date</h4>
                                <p>{{ $actor->BIRTH_DATE }}</p>

                                <h4 class="text-info">Number of Movies</h4>
                                <p>{{ $movie_count }}</p>

                                <h4 class="text-info">Prizes</h4>
                                <p>
                                    @forelse($prizes as $prize)
                                        <strong>{{ $prize->TITLE }}</strong> - {{ $prize->TYPE_OF_PRIZE }}<br>
                                        <small class="text-muted">for "{{ $prize->work_name }}" ({{ $prize->YEAR }})</small><br><br>
                                    @empty
                                        No prizes won yet.
                                    @endforelse
                                </p>

                                {{-- Advertisement --}}
                                @if($adv)
                                <div class="card" style="margin-top: 10px; margin-left:60px; width: 80%;">
                                    <div class="card-body">
                                        <img src="{{ asset('Addvertisements/' . $adv->PICTURE) }}" style="width: 100%;height: 100%;">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Movies + Series --}}
                <div class="product-info">
                    <div class="row" style="padding-right:50px;padding-left:50px;">
                        <div class="col">
                            <h2 style="font-size:42px;font-family:Acme;border-bottom:1px solid #46c2ff;margin-top:22px;">
                                Movies and Series
                            </h2>

                            <div class="row no-gutters row-cols-3 justify-content-center" style="margin-top:25px;">

                                {{-- Movies --}}
                                @foreach($actor->movies as $movie)
                                    <div class="col">
                                        <figure class="figure" style="width:100%;">
                                            <a href="{{ url('/movie/' . $movie->ID) }}">
                                                <img class="figure-img" src="{{ asset($movie->POSTER ?? 'assets/img/movie_pic.jpg') }}" style="width:100%;">
                                            </a>
                                            <figcaption class="figure-caption" style="font-size: 12px;">
                                                {{ $movie->NAME_MOVIE }}
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach

                                {{-- Series --}}
                                @foreach($actor->series as $series)
                                    <div class="col">
                                        <figure class="figure" style="width:100%;">
                                            <a href="{{ route('series.show', $series->ID) }}">
                                                <img class="figure-img" src="{{ asset($series->POSTER ?? 'assets/img/movie_pic.jpg') }}" style="width:100%;">
                                            </a>
                                            <figcaption class="figure-caption" style="font-size: 12px;">
                                                {{ $series->NAME_SERIES }}
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

            </div> {{-- end block-content --}}

        </div>
    </section>
</main>

{{-- FOOTER --}}
<footer id="footer" style="background: rgb(33,33,46);margin-top: 0px;box-shadow: 0px -2px 20px 4px #21212e;">
    <div class="row">
        <div class="col-sm-6 col-md-4 footer-navigation">
            <h3><a href="{{ route('home') }}" style="font-size: 37px;font-family: Cookie, cursive;">NOT&nbsp;&nbsp;<span style="color: rgb(97,154,254);">flix</span></a></h3>
            <p class="links"><a href="{{ route('home') }}">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
            <p class="company-name">CMP © 2023</p>
        </div>

        <div class="col-sm-6 col-md-4 footer-contacts">
            <div class="d-lg-flex justify-content-lg-center align-items-lg-center">
                <img class="d-lg-flex" src="{{ asset('assets/img/icons8-address-64.png') }}">
                <p class="text-left d-lg-flex justify-content-lg-center align-items-lg-center" style="font-size: 14px;font-family: Montserrat, sans-serif;"> Cairo University Rd, Oula, Giza District, Giza Governorate </p>
            </div>
            <div class="d-lg-flex align-items-lg-center">
                <img src="{{ asset('assets/img/icons8-phone-64.png') }}" style="width: 41px;height: 40px;">
                <p class="d-lg-flex footer-center-info email text-left" style="font-family: Montserrat, sans-serif;margin-left: 23px;margin-top: 7px;"> +1 141992110</p>
            </div>
            <div class="d-flex d-lg-flex align-items-center align-items-lg-center">
                <img src="{{ asset('assets/img/icons8-envelope-64.png') }}" style="width: 42px;height: 42px;">
                <p style="margin-top: 7px;margin-left: 0px;"> <a href="#" target="_blank">donya.esawi@gmail.com</a></p>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-4 footer-about">
            <h4>About the Team</h4>
            <p>&nbsp;2nd year grade students in CMP department main stream in faculty of engineering cairo university</p>
            <div class="d-flex justify-content-center social-links social-icons">
                <a href="#"><img src="{{ asset('assets/img/icons8-facebook-64.png') }}" style="width: 36px;"></a>
                <a href="#"><img src="{{ asset('assets/img/icons8-twitter-64.png') }}" style="width: 36px;"></a>
                <a href="#"><img src="{{ asset('assets/img/icons8-linkedin-64.png') }}" style="width: 36px;"></a>
                <a href="#"><img src="{{ asset('assets/img/icons8-github-64.png') }}" style="width: 36px;"></a>
            </div>
        </div>
    </div>
</footer>

{{-- JS --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

</body>
</html>

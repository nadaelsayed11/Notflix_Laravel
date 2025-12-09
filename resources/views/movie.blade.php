<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $movie->NAME_MOVIE }} - NOTflix</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/FontAwesome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Balsamiq+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter">

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

    <style>
        body {
            background: linear-gradient(#bd11fa, #46c2ff);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .movie-container {
            background: rgb(33,33,46);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 60px rgb(45,45,68);
        }
        .movie-poster {
            width: 100%;
            border-radius: 10px;
        }
        .info-label {
            color: #8749ed;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body style="background: linear-gradient(#bd11fa, #46c2ff);">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding: 4px;filter: hue-rotate(9deg); height: 67px">
        <div class="container">
            <a class="navbar-brand logo" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 28px;padding-top: 0px;padding-bottom: 0px;">
                <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: -1px;padding-top: 13px; height: 60px">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <img src="{{ asset('assets/img/icons8-menu-64.png') }}" style="height: 50px">
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link active" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#footer" class="nav-link active" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('logout') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Log out</a>
                    </li>
                </ul>
                @if($user)
                <a class="d-flex justify-content-lg-center align-items-lg-center" href="{{ $user->type === 'admin' ? url('/admin') : url('/user') }}" style="margin-top: 0px;margin-left: 0px;">
                    <span class="d-flex align-items-center" style="font-family: Acme, sans-serif;font-size: 18px;">
                        {{ $user->name }}
                        @if($user->image)
                        <img class="border rounded-circle img-profile" src="{{ asset('assets/user_pics/' . $user->image) }}" style="width: 50px;margin-left: 5px;" onerror="this.style.display='none'">
                        @endif
                    </span>
                </a>
                @endif
            </div>
        </div>
    </nav>

    <main class="page product-page" style="color: rgb(255,255,255);font-size: 24px;padding-top: 70px;">
        <section class="clean-block clean-product dark" style="background: linear-gradient(#bd11fa, #46c2ff);">
            <div class="container">
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center block-heading">
                    <button class="btn btn-primary text-center d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="height: 104px;border-radius: 584px;background: rgb(33,33,46);box-shadow: 0px 0px 20px rgb(33,33,46);border-width: 0px;border-bottom: 0px none rgba(0,123,255,0);margin-bottom: 35px;margin-top: 10px;">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: 11px;filter: hue-rotate(17deg);">
                        </a>
                    </button>
                </div>

                <div class="movie-container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $movie->POSTER ?? 'https://via.placeholder.com/300x450' }}"
                         alt="{{ $movie->NAME_MOVIE }}"
                         class="movie-poster">

                    <div class="mt-3">
                        <h5 class="info-label">IMDB Rating</h5>
                        <p>⭐ {{ $movie->IMDB_RATE ?? 'N/A' }}/10 ({{ $movie->IMDB_RATE_COUNT ?? 0 }} votes)</p>

                        <h5 class="info-label">NOTflix Rating</h5>
                        <p>⭐ {{ number_format($notflix_avg_rate, 1) }}/10 ({{ $notflix_rate_count }} votes)</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <h1>{{ $movie->NAME_MOVIE }}</h1>
                    <p class="text-muted">{{ $movie->YEAR ?? 'Unknown Year' }} | {{ $movie->DURATION_MIN ?? 'N/A' }} min</p>

                    <h5 class="info-label">Description</h5>
                    <p>{{ $movie->DESCRIPTION_OF_MOVIE ?? 'No description available.' }}</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="info-label">Language</h5>
                            <p>{{ $movie->LANGUAGE_MOBIE ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="info-label">Budget</h5>
                            <p>${{ number_format($movie->BUDGET ?? 0) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="info-label">Revenue</h5>
                            <p>${{ number_format($movie->REVENUE ?? 0) }}</p>
                        </div>
                    </div>

                    @if($movie->HOME_PAGE_LINK)
                    <div class="mt-3">
                        <a href="{{ $movie->HOME_PAGE_LINK }}" target="_blank" class="btn btn-primary">
                            Visit Official Website
                        </a>
                    </div>
                    @endif

                    <h5 class="info-label mt-4">Cast</h5>
                    <div class="row">
                        @forelse($movie->actors as $actor)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('actor.show', $actor->ID) }}" class="text-white text-decoration-none">
                                    <div class="text-center">
                                        <img src="{{ $actor->IMAGE ?? 'https://via.placeholder.com/100' }}"
                                             class="rounded-circle"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                        <p class="mt-2 mb-0">{{ $actor->FNAME }} {{ $actor->LNAME }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p>No cast information available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $director->FNAME }} {{ $director->LNAME }} - Director - NOTflix</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(#bd11fa, #46c2ff);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .director-container {
            background: rgb(33,33,46);
            border-radius: 10px;
            padding: 30px;
            margin-top: 100px;
            box-shadow: 0px 0px 60px rgb(45,45,68);
        }
        .director-image {
            width: 100%;
            border-radius: 10px;
            background: rgba(135,73,237,0.32);
            box-shadow: inset 0px 0px 17px #af5eee;
            padding: 10px;
        }
        .info-label {
            color: #8749ed;
            font-weight: bold;
            margin-top: 22px;
            font-size: 28px;
            margin-left: 15px;
        }
        .info-text {
            margin-left: 22px;
            font-size: 16px;
            margin-bottom: 16px;
        }
        .movie-poster {
            width: 100%;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .movie-poster:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">NOTflix</a>
            <div>
                @if($user)
                    <span class="text-white">{{ $user->name }}</span>
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light ms-2">Logout</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="director-container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $director->IMAGE ?? 'https://via.placeholder.com/400x600' }}"
                         alt="{{ $director->FNAME }} {{ $director->LNAME }}"
                         class="director-image">

                    @if($adv)
                    <div class="card mt-3">
                        <div class="card-body">
                            <img src="{{ asset('assets/advertisements/' . $adv->PICTURE) }}"
                                 alt="Advertisement"
                                 style="width: 100%;">
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <h1 style="font-size: 32px; margin-bottom: 30px">{{ $director->FNAME }} {{ $director->LNAME }}</h1>

                    <h5 class="info-label">Birth Date</h5>
                    <p class="info-text">{{ $director->BIRTH_DATE ?? 'N/A' }}</p>

                    <h5 class="info-label">Number of Movies Directed</h5>
                    <p class="info-text">{{ $movie_count }} movie{{ $movie_count != 1 ? 's' : '' }}</p>

                    <h5 class="info-label">Number of Series Directed</h5>
                    <p class="info-text">{{ $series_count }} series</p>

                    <h5 class="info-label">Prizes</h5>
                    <div class="info-text">
                        @forelse($prizes as $prize)
                            <strong>{{ $prize->TITLE }}</strong> - {{ $prize->TYPE_OF_PRIZE }}<br>
                            <small class="text-muted">for "{{ $prize->work_name }}" ({{ $prize->YEAR }})</small><br><br>
                        @empty
                            No prizes won yet.
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row mt-5" style="padding: 0 50px;">
                <div class="col">
                    <h2 style="font-size: 42px; border-bottom: 1px solid #46c2ff; padding: 10px 0;">
                        Movies And Series
                    </h2>

                    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                        @forelse($director->movies as $movie)
                            <div class="col">
                                <a href="{{ route('movie.show', $movie->ID) }}" class="text-decoration-none">
                                    <figure class="figure">
                                        <img src="{{ $movie->POSTER ?? 'https://via.placeholder.com/300x450' }}"
                                             alt="{{ $movie->NAME_MOVIE }}"
                                             class="movie-poster">
                                        <figcaption class="figure-caption text-white text-center mt-2" style="font-size: 16px;">
                                            {{ $movie->NAME_MOVIE }}
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        @empty
                        @endforelse

                        @forelse($director->series as $series)
                            <div class="col">
                                <a href="{{ route('series.show', $series->ID) }}" class="text-decoration-none">
                                    <figure class="figure">
                                        <img src="{{ asset($series->POSTER ?? 'assets/img/movie_pic.jpg') }}"
                                             alt="{{ $series->NAME_SERIES }}"
                                             class="movie-poster">
                                        <figcaption class="figure-caption text-white text-center mt-2" style="font-size: 16px;">
                                            {{ $series->NAME_SERIES }}
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        @empty
                        @endforelse

                        @if($director->movies->isEmpty() && $director->series->isEmpty())
                            <p class="text-white">No movies or series information available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html style="background: rgb(33,33,46);">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Movie - NOTflix Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <style>
        body {
            background: rgb(33,33,46);
            color: #fff;
        }
        .form-container {
            background: rgba(61,5,81,0.3);
            border-radius: 15px;
            padding: 30px;
            margin-top: 100px;
            margin-bottom: 50px;
        }
        .form-label {
            color: #fff;
            font-weight: 500;
        }
        .form-control, .form-select {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            color: #fff;
        }
        .form-control:focus, .form-select:focus {
            background: rgba(255,255,255,0.15);
            border-color: #219bd7;
            color: #fff;
        }
        .form-control::placeholder {
            color: rgba(255,255,255,0.5);
        }
        option {
            background: rgb(61,5,81);
            color: #fff;
        }
        h2 {
            font-family: 'Cookie', cursive;
            font-size: 50px;
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body style="min-height: 100vh;margin: 0px;padding: 0px;">
    {{-- NAVBAR --}}
    <nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="padding: 4px;filter: hue-rotate(9deg);background: rgba(61,5,81,0.9) !important;color: rgb(61,5,81);border-color: rgb(226,227,235);">
        <div class="container">
            <a class="navbar-brand logo" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 28px;padding-top: 0px;padding-bottom: 0px;">
                <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: -1px;padding-top: 13px;">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <img src="{{ asset('assets/img/icons8-menu-64.png') }}">
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Add New Movie</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.movie.store') }}">
                @csrf

                {{-- Basic Information --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Movie Title *</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="year" class="form-label">Year *</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ old('year', date('Y')) }}" min="1800" max="{{ date('Y') + 10 }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="duration" class="form-label">Duration (minutes) *</label>
                        <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" min="1" required>
                    </div>
                </div>

                {{-- Poster and Homepage --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="poster" class="form-label">Poster URL</label>
                        <input type="url" class="form-control" id="poster" name="poster" value="{{ old('poster') }}" placeholder="https://example.com/poster.jpg">
                    </div>
                    <div class="col-md-6">
                        <label for="homepage_link" class="form-label">Homepage Link</label>
                        <input type="url" class="form-control" id="homepage_link" name="homepage_link" value="{{ old('homepage_link') }}" placeholder="https://example.com">
                    </div>
                </div>

                {{-- Financial Information --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="budget" class="form-label">Budget ($)</label>
                        <input type="number" class="form-control" id="budget" name="budget" value="{{ old('budget') }}" min="0" step="0.01">
                    </div>
                    <div class="col-md-4">
                        <label for="revenue" class="form-label">Revenue ($)</label>
                        <input type="number" class="form-control" id="revenue" name="revenue" value="{{ old('revenue') }}" min="0" step="0.01">
                    </div>
                    <div class="col-md-4">
                        <label for="language" class="form-label">Language *</label>
                        <input type="text" class="form-control" id="language" name="language" value="{{ old('language') }}" required>
                    </div>
                </div>

                {{-- IMDB Information --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="imdb_rate" class="form-label">IMDB Rating (0-10)</label>
                        <input type="number" class="form-control" id="imdb_rate" name="imdb_rate" value="{{ old('imdb_rate') }}" min="0" max="10" step="0.1">
                    </div>
                    <div class="col-md-6">
                        <label for="imdb_rate_count" class="form-label">IMDB Vote Count</label>
                        <input type="number" class="form-control" id="imdb_rate_count" name="imdb_rate_count" value="{{ old('imdb_rate_count') }}" min="0">
                    </div>
                </div>

                {{-- Director --}}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="director_id" class="form-label">Director *</label>
                        <select class="form-select" id="director_id" name="director_id" required>
                            <option value="">Select Director</option>
                            @foreach($directors as $director)
                                <option value="{{ $director->ID }}" {{ old('director_id') == $director->ID ? 'selected' : '' }}>
                                    {{ $director->FNAME }} {{ $director->LNAME }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Actors --}}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="actors" class="form-label">Actors (select multiple)</label>
                        <select class="form-select" id="actors" name="actors[]" multiple size="5">
                            @foreach($actors as $actor)
                                <option value="{{ $actor->ID }}" {{ in_array($actor->ID, old('actors', [])) ? 'selected' : '' }}>
                                    {{ $actor->FNAME }} {{ $actor->LNAME }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple actors</small>
                    </div>
                </div>

                {{-- Genres --}}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="genres" class="form-label">Genres (select multiple)</label>
                        <select class="form-select" id="genres" name="genres[]" multiple size="5">
                            @foreach($genres as $genre)
                                <option value="{{ $genre->ID }}" {{ in_array($genre->ID, old('genres', [])) ? 'selected' : '' }}>
                                    {{ $genre->GENRE_TYPE }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple genres</small>
                    </div>
                </div>

                {{-- Description --}}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                    </div>
                </div>

                {{-- Submit Buttons --}}
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg" style="background: #219bd7;border: none;padding: 10px 40px;font-size: 18px;">
                            <i class="fa fa-save"></i> Add Movie
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg" style="padding: 10px 40px;font-size: 18px;margin-left: 15px;">
                            <i class="fa fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

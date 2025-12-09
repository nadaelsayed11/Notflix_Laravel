<!DOCTYPE html>
<html style="height: 622px;background: url('{{ asset('images/outer-space-background.jpg') }}');">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard - NOTflix</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/-Filterable-Cards-.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/NotflixButton.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Notflixfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/NotflixNavBar.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
</head>

<body id="page-top" style="height: 526px;margin: 0;padding: 0;background: rgba(49,23,54,0);">
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
                    <li class="nav-item" style="font-size: 16px;">
                        <a class="nav-link" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" style="color: rgba(255,255,255,0.9);font-family: Acme, sans-serif;font-size: 18px;">Log out</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background: rgba(33,33,46,0);font-family: Acme, sans-serif;font-size: 18px;color: rgb(255,255,255);">Add&nbsp;</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.movie.add') }}">Film</a>
                            <a class="dropdown-item" href="{{ route('admin.series.add') }}">Series</a>
                            <a class="dropdown-item" href="#">Novel</a>
                            <a class="dropdown-item" href="#">Season</a>
                            <a class="dropdown-item" href="{{ route('admin.actor.add') }}">Actor</a>
                            <a class="dropdown-item" href="#">Character</a>
                            <a class="dropdown-item" href="{{ route('admin.prize.add') }}">Prize</a>
                            <a class="dropdown-item" href="{{ route('admin.director.add') }}">Director</a>
                            <a class="dropdown-item" href="#">Advertisement</a>
                            <a class="dropdown-item" href="#">Company</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        {{-- PROFILE SECTION --}}
        <div class="text-center profile-card" style="margin: 15px;color: #858796;background: rgba(255,255,255,0);border-color: rgba(133,135,150,0);">
            <div style="margin-top: 94px;margin-right: 0px;">
                <div class="row" style="margin-right: 0px;">
                    <div class="col-auto" style="margin-right: 20px;margin-left: 0px;">
                        <img class="img-thumbnail d-xl-flex align-items-xl-start" style="margin-top: 0px;text-align: right;object-fit: cover;" src="{{ $user->image ? asset('images/user_pics/' . $user->image) : asset('assets/img/default-user.png') }}" alt="{{ $user->name }}" width="150px" height="150px">
                    </div>
                    <div class="col-auto" style="margin-top: 0px;">
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

        {{-- CONTENT SECTION --}}
        <section class="py-5">
            <div class="container">
                <h1 class="text-center mb-4" style="border-color: rgb(248,248,249);color: rgb(246,247,248);font-size: 30px;">
                    <em>Film & series & Advertisement added</em><br>
                </h1>

                {{-- FILTER CONTROLS --}}
                <div class="filtr-controls text-center lead text-uppercase mb-3">
                    <span class="active d-inline-block mx-3 py-1 position-relative" data-filter="all" style="color: rgb(252,252,254);">all </span>
                    <span class="d-inline-block mx-3 py-1 position-relative" data-filter="film" style="color: rgb(255,255,255);"><em>Film</em>&nbsp;</span>
                    <span class="d-inline-block mx-3 py-1 position-relative" data-filter="Series" style="color: rgb(255,255,255);"><em>Series</em>&nbsp;</span>
                    <span class="d-inline-block mx-3 py-1 position-relative" data-filter="Advertisement" style="color: rgb(252,252,255);"><em>Advertisement</em>&nbsp;</span>
                </div>

                {{-- GRID OF CARDS --}}
                <div class="row filtr-container">
                    {{-- MOVIES --}}
                    @foreach($movies as $movie)
                        <div class="col-md-6 col-lg-4 filtr-item" data-category="film">
                            <div class="card border-dark" style="color: rgb(176,179,204);background: rgba(255,255,255,0);">
                                <div class="card-header text-light" style="background: rgba(90,92,105,0);">
                                    <a href="{{ route('movie.show', $movie->ID) }}" rel="stylesheet" type="text/css">
                                        <h5 class="m-0" style="font-size: 26px;font-family: Almendra, serif;border-color: rgb(255,255,255);">{{ $movie->NAME_MOVIE }}</h5>
                                    </a>
                                </div>
                                <a href="{{ route('movie.show', $movie->ID) }}" rel="stylesheet" type="text/css">
                                    <img class="img-fluid card-img w-100 d-block rounded-0" src="{{ $movie->POSTER ?? asset('assets/img/91SCNVEssVL._AC_SY741_.jpg') }}" alt="{{ $movie->NAME_MOVIE }}">
                                </a>
                                <div class="card-body" style="background: linear-gradient(white 63%, rgb(151,189,255) 100%), rgb(255,255,255);color: rgb(1,5,41);">
                                    <p class="card-text" style="color: rgb(30,8,58);">{{ Str::limit($movie->DESCRIPTION_OF_MOVIE, 150) }}<br></p>
                                </div>
                                <div class="d-flex card-footer" style="background: rgb(151,189,255);">
                                    <button class="btn btn-dark btn-sm" type="button" onclick="alert('Edit functionality coming soon');" style="background: rgba(245,245,247,0);color: rgb(30,8,58);border-color: rgba(40,13,96,0);font-size: 18px;font-family: Almendra, serif;">
                                        <i class="fa fa-pencil-square-o"></i>&nbsp;Edit
                                    </button>
                                    <button class="btn btn-outline-dark btn-sm ml-auto" type="button" onclick="alert('Delete functionality coming soon');" style="color: rgb(30,8,58);background: rgba(248,244,244,0);border-color: rgba(40,13,96,0);font-size: 18px;font-family: Almendra, serif;">
                                        <i class="fa fa-trash-o"></i>&nbsp;Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- SERIES --}}
                    @foreach($series as $serie)
                        <div class="col-md-6 col-lg-4 filtr-item" data-category="Series">
                            <div class="card border-dark" style="color: rgb(176,179,204);background: rgba(255,255,255,0);">
                                <div class="card-header text-light" style="background: rgba(90,92,105,0);">
                                    <a href="{{ route('series.show', $serie->ID) }}" rel="stylesheet" type="text/css">
                                        <h5 class="m-0" style="font-size: 26px;font-family: Almendra, serif;border-color: rgb(255,255,255);">{{ $serie->NAME_SERIES }}</h5>
                                    </a>
                                </div>
                                <a href="{{ route('series.show', $serie->ID) }}" rel="stylesheet" type="text/css">
                                    <img class="img-fluid card-img w-100 d-block rounded-0" src="{{ $serie->POSTER ?? asset('assets/img/91SCNVEssVL._AC_SY741_.jpg') }}" alt="{{ $serie->NAME_SERIES }}">
                                </a>
                                <div class="card-body" style="background: linear-gradient(white 63%, rgb(151,189,255) 100%), rgb(255,255,255);color: rgb(1,5,41);">
                                    <p class="card-text" style="color: rgb(30,8,58);">{{ Str::limit($serie->DESCRIPTION, 150) }}<br></p>
                                </div>
                                <div class="d-flex card-footer" style="background: rgb(151,189,255);">
                                    <button class="btn btn-dark btn-sm" type="button" onclick="alert('Edit functionality coming soon');" style="background: rgba(245,245,247,0);color: rgb(30,8,58);border-color: rgba(40,13,96,0);font-size: 18px;font-family: Almendra, serif;">
                                        <i class="fa fa-pencil-square-o"></i>&nbsp;Edit
                                    </button>
                                    <button class="btn btn-outline-dark btn-sm ml-auto" type="button" onclick="alert('Delete functionality coming soon');" style="color: rgb(30,8,58);background: rgba(248,244,244,0);border-color: rgba(40,13,96,0);font-size: 18px;font-family: Almendra, serif;">
                                        <i class="fa fa-trash-o"></i>&nbsp;Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- ADVERTISEMENTS --}}
                    @foreach($advertisements as $ad)
                        <div class="col-md-6 col-lg-4 filtr-item" data-category="Advertisement">
                            <div class="card border-dark" style="color: rgb(176,179,204);background: rgba(255,255,255,0);">
                                <div class="card-header text-light" style="background: rgba(90,92,105,0);">
                                    <h5 class="m-0" style="font-size: 26px;font-family: Almendra, serif;border-color: rgb(255,255,255);">Advertisement</h5>
                                </div>
                                <img class="img-fluid card-img w-100 d-block rounded-0" src="{{ asset('Addvertisements/' . $ad->PICTURE) }}" alt="Advertisement">
                                <div class="card-body" style="background: linear-gradient(white 63%, rgb(151,189,255) 100%), rgb(255,255,255);color: rgb(1,5,41);">
                                    <p class="card-text" style="color: rgb(30,8,58);"><br></p>
                                </div>
                                <div class="d-flex card-footer" style="background: rgb(151,189,255);">
                                    <button class="btn btn-outline-dark btn-sm ml-auto" type="button" onclick="alert('Delete functionality coming soon');" style="color: rgb(30,8,58);background: rgba(248,244,244,0);border-color: rgba(40,13,96,0);font-size: 18px;font-family: Almendra, serif;">
                                        <i class="fa fa-trash-o"></i>&nbsp;Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    {{-- SCRIPTS --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/-Filterable-Cards-.js') }}"></script>
</body>
</html>

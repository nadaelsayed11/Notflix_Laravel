<!DOCTYPE html>
<html style="background: rgb(33,33,46);">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Actor - NOTflix Admin</title>
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
            max-width: 800px;
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
        .form-check-input {
            background-color: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.3);
        }
        .form-check-input:checked {
            background-color: #219bd7;
            border-color: #219bd7;
        }
        .form-check-label {
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
        <div class="form-container mx-auto">
            <h2>Add New Actor</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.actor.store') }}">
                @csrf

                {{-- Name Fields --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                </div>

                {{-- Gender --}}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Gender *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_m" value="M" {{ old('gender') == 'M' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="gender_m">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_f" value="F" {{ old('gender') == 'F' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="gender_f">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Birth Date --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">Birth Date *</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Image URL</label>
                        <input type="url" class="form-control" id="image" name="image" value="{{ old('image') }}" placeholder="https://example.com/actor-photo.jpg">
                    </div>
                </div>

                {{-- Submit Buttons --}}
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg" style="background: #219bd7;border: none;padding: 10px 40px;font-size: 18px;">
                            <i class="fa fa-save"></i> Add Actor
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Profile - NOTflix</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
</head>

<body style="background: #21212e; padding-right: 0px">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white transparency border-bottom border-light" id="transmenu" style="height: 72px;">
        <div class="container">
            <a class="navbar-brand text-success" href="{{ route('home') }}" style="padding-top: 0px;padding-bottom: 0px;">
                <img src="{{ asset('assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png') }}" style="margin-top: 2px;padding-top: 8px;height: 63px;width: 173px;" />
            </a>
            <button data-toggle="collapse" class="navbar-toggler collapsed" data-target="#navcol-1">
                <img src="{{ asset('assets/img/icons8-menu-64.png') }}" style="width: 49px;height: 47px;margin-top: -15px;" />
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" style="color: rgb(255,255,255);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.profile') }}" style="color: rgb(255,255,255);">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" style="color: rgb(255,255,255);">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: rgba(255,255,255,0.1); border: 2px solid #46c2ff;">
                    <div class="card-header" style="background: rgba(111,56,255,0.3);">
                        <h3 style="color: #fff; margin: 0; font-family: 'Cookie', cursive; font-size: 35px;">Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('user.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label style="color: #fff;">Username (cannot be changed)</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled style="background: rgba(255,255,255,0.1); color: #ccc; border: 1px solid #46c2ff;">
                            </div>

                            <div class="form-group">
                                <label style="color: #fff;">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Leave empty to keep current" style="background: rgba(255,255,255,0.1); color: #fff; border: 1px solid #46c2ff;">
                            </div>

                            <div class="form-group">
                                <label style="color: #fff;">New Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Leave empty to keep current" style="background: rgba(255,255,255,0.1); color: #fff; border: 1px solid #46c2ff;">
                            </div>

                            <div class="form-group">
                                <label style="color: #fff;">Age</label>
                                <input type="number" name="age" class="form-control" value="{{ $user->age }}" min="0" max="200" placeholder="Leave empty to keep current" style="background: rgba(255,255,255,0.1); color: #fff; border: 1px solid #46c2ff;">
                            </div>

                            <div class="form-group">
                                <label style="color: #fff;">Gender (cannot be changed)</label>
                                <input type="text" class="form-control" value="{{ $user->gender === 'M' ? 'Male' : 'Female' }}" disabled style="background: rgba(255,255,255,0.1); color: #ccc; border: 1px solid #46c2ff;">
                            </div>

                            <div class="form-group">
                                <label style="color: #fff;">Current Avatar</label>
                                <div>
                                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}'s Avatar" style="width: 100px; height: 100px; border-radius: 50%; border: 2px solid #46c2ff; object-fit: cover;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="color: #fff;">Upload New Avatar</label>
                                <input type="file" name="image" class="form-control" accept="image/*" style="background: rgba(255,255,255,0.1); color: #fff; border: 1px solid #46c2ff;">
                                <small style="color: #ccc;">Upload a new profile picture (JPG, PNG, GIF - Max 2MB)</small>
                            </div>

                            <div class="text-center" style="margin-top: 30px;">
                                <button type="submit" class="btn btn-primary" style="background: linear-gradient(28deg, #BD11FA, #46C2FF); border: none; padding: 10px 40px; border-radius: 25px;">Update Profile</button>
                                <a href="{{ route('user.profile') }}" class="btn btn-secondary" style="padding: 10px 40px; border-radius: 25px; margin-left: 10px;">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

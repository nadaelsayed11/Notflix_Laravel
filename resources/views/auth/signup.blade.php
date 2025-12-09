<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign Up - NOTflix</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
</head>

<body class="d-lg-flex justify-content-lg-center align-items-lg-center" style="background: url('{{ asset('assets/img/group_38.png') }}') no-repeat, #21212e;background-size: contain, auto;">
    <div>
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6">
                    <div>
                        <div id="first_Col">
                            <h1 style="color: rgb(101,149,254);text-align: left;margin-top: 25px;font-size: 46px;">Welcome to NOTflix</h1>
                            <p style="font-size: 15px;letter-spacing: 2px;font-style: italic;margin-left: 12px;">Find the latest and greatest Movies, Series, Novels that fit your taste</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div style="text-align: center;">
                            <img class="img-fluid" src="{{ asset('assets/img/Untitled design.png') }}" style="width: 130px;">
                        </div>
                        <div>
                            <h1 style="color: rgb(255,255,255);text-align: center;margin-bottom: 24px;">Sign Up</h1>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('signup') }}" method="POST">
                            @csrf

                            <div>
                                <div style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 10px;">
                                    <input type="text" name="username" value="{{ old('username') }}" style="padding: 0px;margin-top: 4px;margin-left: 26px;width: 240px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;" placeholder="Enter A valid User Name" required>
                                </div>
                            </div>
                            <div>
                                <div style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 10px;">
                                    <input type="number" name="age" value="{{ old('age') }}" style="margin-top: 5px;margin-left: 29px;width: 240px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);color: #707070;" placeholder="Enter Your Age" min="0" max="200" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="d-inline-flex">
                                    <div class="form-check d-lg-flex">
                                        <input type="radio" class="form-check-input" id="formCheck-1" style="margin-top: 6px;" name="gender" value="M" {{ old('gender') == 'M' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="formCheck-1" style="color: rgb(152,73,252);margin-bottom: 0px;padding: 0px;margin-left: 5px;">Male</label>
                                    </div>
                                    <div class="form-check d-lg-flex" style="margin-left: 27px;">
                                        <input type="radio" class="form-check-input" id="formCheck-2" style="margin-top: 6px;filter: brightness(127%) saturate(124%) sepia(0%);" name="gender" value="F" {{ old('gender') == 'F' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="formCheck-2" style="color: rgb(154,69,252);margin-bottom: 0px;padding: 0px;margin-left: 5px;">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 10px;margin-top: 10px;">
                                <i class="fa fa-envelope" style="margin-left: 16px;color: rgb(147,78,251);"></i>
                                <input type="email" name="email" value="{{ old('email') }}" style="padding: 0px;margin-top: 4px;margin-left: 15px;width: 182px;background: rgba(255,255,255,0);border-color: rgba(0,0,0,0);text-align: left;color: #707070;" placeholder="Enter Your Email Address" required>
                            </div>
                            <div style="height: 45px;background: rgba(200,200,200,0);border-radius: 45px;border: 2.4px solid #46c2ff;margin-bottom: 10px;">
                                <i class="fa fa-lock" style="margin-left: 16px;color: #9a46fc;width: 11px;"></i>
                                <input type="password" name="password" style="margin-top: 5px;width: 155px;color: rgb(112,112,112);background: rgba(255,255,255,0);border-color: rgba(112,112,112,0);margin-left: 19px;" placeholder="Password" required>
                            </div>
                            <div style="text-align: center;">
                                <button class="btn btn-primary d-table-row" type="submit" style="width: 120px;border-radius: 45px;background: linear-gradient(28deg, #BD11FA, #46C2FF);border-width: 0px;box-shadow: -1px 1px 20px 8px var(--purple);margin-top: 18px;">Sign Up</button>
                            </div>
                            <div style="margin-top: 22px;text-align: center;">
                                <p class="d-inline" style="color: rgb(255,255,255);">Already Have An account?</p>
                                <a class="d-inline" style="color: rgb(72,203,255);text-shadow: 0px 0px 9px;font-weight: bold;font-style: italic;border-style: none;border-bottom-style: solid;" href="{{ route('signin') }}">Sign In</a>
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

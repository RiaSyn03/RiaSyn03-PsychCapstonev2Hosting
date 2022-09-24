<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
</head>
<body> 
    </head>
    <body>
        <div class="loginbody">
            <div class="imgBx">
                <img src="../img/mh2.jpg">
            </div>
            <div class="contentBx">
                <div class="formBx">
                   <h2>Pysch Care 2.0</h2>
                   <h3>Login</h3>
                   <form method="POST" action="{{ route('login') }}">
                    @csrf
                       <div class="inputBx">
                           <span>Email</span>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                           @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                        </div>
                       <div class="inputBx">
                           <span>Password</span>
                           <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>
                       <div class="remember">
                           <label><input type="checkbox" name=" ">Remember Me</label>
                       </div> 
                       <div class="inputBx">
                        <input type="submit" value="Sign in" name="">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
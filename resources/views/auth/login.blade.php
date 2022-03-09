<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/backend.css')}}">
    <title>Login</title>
</head>
<body>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                        {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                    <div class="card auth-card">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center auth-content">
                                <div class="col-lg-7 align-self-center">
                                    <div class="p-3">
                                        <h2 class="mb-4">{{ __('Login') }}</h2>
                                        <!-- Validation Errors -->
                                    <form method="POST" action="{{ route('login') }}" data-toggle="validator">
                                              @csrf
                                            <div class="row">
                                                <div class="col-lg-12 mb-4">
                                                    <div class="floating-label form-group m-0">
                                                        <input class="floating-input form-control  " id="email"
                                                               type="email" name="email"       value="{{old('email')}}"
                                                               placeholder="" required>
                                                        <label style="padding: 0px 8px" >{{ __('Email Address') }}<span class="text-danger"> *</span></label>
                                                     </div>
                                                     @error("email")
                                                     <div >
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                    @enderror
                                                </div>
                                          
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group m-0">
                                                        <input class="floating-input form-control" type="password"
                                                               placeholder="" name="password" required
                                                               value="{{old('password')}}"
                                                               autocomplete="current-password">
                                                        <label style="padding: 0px 8px">{{ __('Password') }}<span class="text-danger"> *</span></label>
                                                    </div>
                                                    @error("password")
                                                    <div >
                                                       <span class="text-danger">{{ $message }}</span>
                                                   </div>
                                                   @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customCheck1"
                                                                name="remember"
                                                                  {{ old('remember') ? 'checked' : '' }}
                                                               >
                                                        <label class="custom-control-label control-label-1"
                                                               for="customCheck1">  {{ __('Remember Me') }}</label>
                                                    </div>
                                                </div>
                                                   @if (Route::has('password.request'))
                                                 <div class="col-lg-6">
                                                    <a href="{{ route('password.request') }}"
                                                       class="text-primary float-right">     {{ __('Forgot Your Password?') }}</a>
                                                 </div>
                                                 @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary">     {{ __('Login') }}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 content-right">
                                    <img src="{{asset('images/login/01.png')}} " class="img-fluid image-right" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>





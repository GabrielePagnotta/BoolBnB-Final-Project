@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card personal-radius-top personal-radius-bottom personal-opacity-70">
                <div class="card-header personal-radius-top personal-bg-lightblue-reverse text-light text-shadow"><h3>{{ __('Login') }}</h3></div>

                <div class="card-body personal-radius-bottom personal-bg-lightblue">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-light text-shadow"><h5>{{ __('E-Mail Address') }}</h5></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-light text-shadow"><h5>{{ __('Password') }}</h5></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-light text-shadow" for="remember">
                                        <h6>{{ __('Remember Me') }}</h6>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-light text-dark box-shadow">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-light personal-underline" href="{{ route('password.request') }}">
                                        <h6>{{ __('Forgot Your Password?') }}</h6>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .personal-radius-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .personal-radius-bottom {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .personal-bg-lightblue {
        background-image: linear-gradient(to top, #ff617e 20%, #f696a8);
    }
    .personal-bg-lightblue-reverse {
        background-image: linear-gradient(to bottom, #ff617e 20%, #FF8098);
    }
    .text-shadow {
        text-shadow: 0 0 5px white;
    }
    .box-shadow {
        box-shadow: 0 0 10px 1px white;
    }
    .personal-underline {
        text-decoration: underline;
    }
    .personal-opacity-70 {
        opacity: 0.70;
    }
</style>
@endsection

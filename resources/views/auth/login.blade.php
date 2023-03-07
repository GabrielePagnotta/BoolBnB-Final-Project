@extends('layouts.app')

@section('content')
<div class="container hg">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card personal-radius-top personal-radius-bottom personal-opacity-70">
                <div class="card-header personal-radius-top personal-bg-pink-reverse text-light text-shadow"><h3>{{ __('Login') }}</h3></div>

                <div class="card-body personal-radius-bottom personal-bg-pink">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="d-flex flex-column align-items-center mb-4">
                            <label for="email" class="col-form-label text-md-right text-light text-shadow"><h5>{{ __('E-Mail Address') }}</h5></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="text-center form-control col-12 mx-auto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center mb-4">
                            <label for="password" class="col-form-label text-md-right text-light text-shadow"><h5>{{ __('Password') }}</h5></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="text-center form-control col-12 mx-auto @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" minlength="8">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center mb-4">
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-light text-shadow" for="remember">
                                        <h6>{{ __('Remember Me') }}</h6>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center mb-4">
                            <div class="col-md-8 d-flex flex-column align-items-center">
                                <button type="submit" class="d-block btn btn-light border-danger text-danger box-shadow text-fw" style="width: 100px">
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
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }
    .personal-radius-bottom {
        border-bottom-left-radius: 300px;
        border-bottom-right-radius: 300px;
    }
    .personal-bg-pink {
        background-image: linear-gradient(to top, #ff617e 20%, #f696a8);
    }
    .personal-bg-pink-reverse {
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
    .text-fw {
        font-weight: 900;
    }

.hg{
    height: 100vh;
}
</style>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card personal-opacity-70 personal-radius-bottom">
                    <div class="card-header personal-bg-pink-reverse text-light text-shadow">
                        <h3>{{ __('Register') }}</h3>
                    </div>

                    <div class="card-body personal-bg-pink personal-radius-bottom">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!--name-->
                            <div class="form-group row">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-right text-light text-shadow">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--last-name-->
                            <div class="form-group row">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-right text-light text-shadow">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right text-light text-shadow">{{ __('E-Mail Address') }}
                                    <span class="textCampiObbligatori">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="border border-danger form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth"
                                    class="col-md-4 col-form-label text-md-right text-light text-shadow">{{ __('Date of birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}"
                                        autocomplete="date_of_birth">
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right text-light text-shadow">{{ __('Password') }}
                                    <span class="textCampiObbligatori">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="border border-danger form-control"
                                        name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Password Confirm --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right text-light text-shadow">{{ __('Confirm Password') }}
                                    <span class="textCampiObbligatori">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="border border-danger form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                        class="btn btn-light border-danger text-danger box-shadow text-fw">
                                        {{ __('Register') }}
                                    </button>
                                    <div class="campiObbligatori mt-2 text-fw ">* Campi obbligatori</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password-confirm").value;

            if (password != confirmPassword) {
                document.getElementById("password-confirm").setCustomValidity("Le password non corrispondono");
            } else {
                document.getElementById("password-confirm").setCustomValidity('');
            }
        }

        var password = document.getElementById("password");
        var confirmPassword = document.getElementById("password-confirm");

        password.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;
    </script>

    <style>
        .campiObbligatori {
            font-size: 0.8rem;
            text-decoration: underline;
            color: rgb(124, 11, 11);
        }

        .textCampiObbligatori {
            color: rgb(124, 11, 11);
        }

        .personal-bg-pink {
            background-image: linear-gradient(to top, #ff617e 20%, #f696a8);
        }

        .personal-bg-pink-reverse {
            background-image: linear-gradient(to bottom, #ff617e 20%, #FF8098);
        }

        .personal-opacity-70 {
            opacity: 0.70;
        }

        .text-shadow {
            text-shadow: 0 0 5px white;
        }

        .box-shadow {
            box-shadow: 0 0 10px 1px white;
        }

        .text-fw {
            font-weight: 900;
        }

        .personal-radius-bottom {
            border-bottom-left-radius: 300px;
            border-bottom-right-radius: 300px;
        }
    </style>
@endsection

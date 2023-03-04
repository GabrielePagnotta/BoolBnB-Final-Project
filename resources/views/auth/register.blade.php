@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card personal-opacity-70 personal-radius-bottom d-flex justyfi-content-center">
                    <div class="card-header personal-bg-pink-reverse text-light text-shadow">
                        <h3>{{ __('Register') }}</h3>
                    </div>

                    <div class="card-body personal-bg-pink personal-radius-bottom text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!--name-->
                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <label for="first_name" class="col-form-label text-light text-shadow"><h5>{{ __('First Name') }}</h5></label>
                                    <input id="first_name" type="text"
                                        class="form-control col-12 mx-auto text-center @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--last-name-->
                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <label for="last_name" class="col-form-label text-light text-shadow"><h5>{{ __('Last Name') }}</h5></label>
                                    <input id="last_name" type="text"
                                        class="form-control col-12 mx-auto text-center @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <label for="email" class="col-form-label text-light text-shadow d-flex justify-content-center"><h5>{{ __('E-Mail Address') }}</h5><span class="textCampiObbligatori">*</span></label>
                                    <input id="email" type="email"
                                        class="border border-danger form-control col-12 mx-auto text-center @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <label for="date_of_birth" class="col-md-12 col-form-label text-light text-shadow"><h5>{{ __('Date of birth') }}</h5></label>
                                    <input id="date_of_birth" type="date"
                                        class="form-control col-12 mx-auto text-center @error('date_of_birth') is-invalid @enderror"
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
                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <label for="password" class="col-md-12 col-form-label text-light text-shadow d-flex justify-content-center"><h5>{{ __('Password') }}</h5><span class="textCampiObbligatori">*</span></label>
                                    <input id="password" type="password"
                                        class="border border-danger form-control col-12 mx-auto text-center"
                                        name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Password Confirm --}}
                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <label for="password-confirm" class="col-form-label text-light text-shadow d-flex justify-content-center"><h5>{{ __('Confirm Password') }}</h5><span class="textCampiObbligatori">*</span></label>
                                    <input id="password-confirm" type="password" class="border border-danger form-control col-12 mx-auto text-center"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-sm-6">
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

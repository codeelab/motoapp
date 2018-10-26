@extends('layouts.login')

@section('content')
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="login-card card-block">
                   <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="md-float-material">
                        @csrf


            @if(session()->has('login_error'))
                <div class="alert alert-success">
                  {{ session()->get('login_error') }}
                </div>
            @endif
                        <div class="text-center">
                            <img src="{{ asset('images/logo-blue.png') }}" alt="logo">
                        </div>

                        <div class="md-input-wrapper">
                            <input id="email" type="text" class="md-form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                            <label>Usuario</label>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="md-input-wrapper">
                            <input id="password" type="password" class="md-form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                            <label>Contraseña</label>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                        </div>


                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                            <div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
                                <label class="input-checkbox checkbox-primary">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <span class="checkbox"></span>
                                </label>
                                <div class="captions">{{ __('Recordar') }}</div>

                            </div>
                                </div>
                            <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                <a href="{{ route('password.request') }}" class="text-right f-w-600">{{ __('Restablecer contraseña?') }}</a>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 offset-xs-1">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"> {{ __('ACCEDER') }}</button>
                            </div>
                        </div>
                        <!-- <div class="card-footer"> -->
                        <div class="col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-8 text-left">
                                    <span class="text-muted">Colegios Motolinia &copy; 1930 - {{ date('Y') }}</span>            
                                </div>
                                <div class="col-md-4 text-right">
                                  <a href="www.codeelab.com">Codeelab</a>
                                </div>
                            </div>
                        </div>

                        <!-- </div> -->
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of login-card -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
@endsection

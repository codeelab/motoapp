@extends('layouts.login')

@section('content')
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="login-card card-block">
                     <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" class="md-float-material">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('images/logo-blue.png') }}" alt="logo">
                        </div>

                        <div class="md-input-wrapper">

                            <input id="nombre" type="text" class="md-form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus />
                            <label>Nombre</label>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="md-input-wrapper">

                            <input id="a_paterno" type="text" class="md-form-control {{ $errors->has('a_paterno') ? ' is-invalid' : '' }}" name="a_paterno" value="{{ old('a_paterno') }}" required autofocus />
                            <label>Apellido Paterno</label>

                                @if ($errors->has('a_paterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('a_paterno') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="md-input-wrapper">

                            <input id="a_materno" type="text" class="md-form-control {{ $errors->has('a_materno') ? ' is-invalid' : '' }}" name="a_materno" value="{{ old('a_materno') }}" required autofocus />
                            <label>Apellido Materno</label>

                                @if ($errors->has('a_materno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('a_materno') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="md-input-wrapper">
                            <input id="email" type="email" class="md-form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                            <label>Correo Electrónico</label>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="md-input-wrapper">
                            <input id="username" type="text" class="md-form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus />
                            <label>Usuario</label>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
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

                       <div class="md-input-wrapper">
                                <input id="password-confirm" type="password" class="md-form-control" name="password_confirmation" required />
                                <label>Confirmar Contraseña</label>
                        </div>

                        <div class="row">
                            <div class="col-xs-10 offset-xs-1">
                                <input id="status" type="hidden" class="md-form-control" name="status" value="1" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-10 offset-xs-1">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">{{ __('REGISTRAR') }}</button>
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
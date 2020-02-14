@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>Kasle</b>GLAN</a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">Registrar Administrador</p>
                <form action="{{ url('/register') }}" method="post">
                    <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Nombres Completo" name="name" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input autocomplete="off" type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input autocomplete="off" type="password" class="form-control" placeholder="Contraseña" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input autocomplete="off" type="password" class="form-control" placeholder="Repetir Contraseña" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input autocomplete="off" type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input autocomplete="off" type="text" class="form-control" placeholder="Telefono/Clular" name="telefono" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            <label>
                                <div class="checkbox_register icheck">
                                    <label>
                                        <input type="checkbox" name="terms">
                                    </label>
                                </div>
                            </label>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Aseptar Terminos</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-6 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                @include('adminlte::auth.partials.social_login')

                <a href="{{ url('/login') }}" class="text-center">Ya Tengo una Cuenta de Cliente</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</body>

@endsection

@extends('layouts.login')

@section('content')


    <!-- Login Div Start Here -->
    <div class="login animated flipInY" id="logindiv">
        <div class="text-center logo">
            <img src="{{URL::asset('assets/assetsAdmin/images/icon_app.png')}}" alt="logo">
            <span style="font-size: 25px"><strong>Cabi Cal</strong></span>
        </div>
        <span><strong>Dr:</strong> docteur@docteur.com</span>
        </br>
        <span><strong>Sc:</strong> secretaire@secretaire.com</span>
        </br>
        <span><strong>Mdp:</strong> 1234</span>
        </br>

        <form role="form" role="form" class="loginForm" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-icon">
                    <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="email@example.com">
                    @if ($errors->has('email'))
                        <span class="help-block">
                              <strong>Ces informations ne correspondent pas à nos enregistrements. </strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-icon">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                               <strong>Mode de passe Incorrect  </strong>
                         </span>
                    @endif
                </div>
            </div>


            <div class="clearfix">

                <div class="checkbox pull-left">
                    <div class="mk-trc" data-style="check">
                        <input  name="remember"  id="chkRemember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <label for="chkRemember"> Souvener De Moi</label>
                    </div>
                </div>

                <a href="javascript:void(0);" class="pull-right lnkForgot">Mot de passe Oublié ? </a>
            </div>

            <div class="clearfix">
                <button type="submit" class="btn btn-primary pull-right">LOGIN</button>
            </div>

            <div class="clearfix mt-md">
                Si vous n'avez pas de compte <a href="javascript:;" class="lnkRegister">INSCRIVEZ-VOUS</a> ici
            </div>
        </form>

    </div>
    <!-- Login Div Ends Here -->

    <!-- Forgot Div Start Here -->
    <div class="login animated flipInY" id="forgotDiv">
        <div class="text-center logo">
            <img src="{{URL::asset('assets/assetsAdmin/images/icon_app.png')}}" alt="logo">
            <span style="font-size: 25px"><strong>Cabi Cal</strong></span>
        </div>

        <form role="form" class="ForgotForm">

            <div class="clearfix">
                <p>Enter your e-mail address below to reset your password.</p>
            </div>

            <div class="form-group">
                <div class="input-icon">
                    <input type="email" class="form-control" name="forgot_email" placeholder="email@example.com">
                </div>
            </div>

            <div class="clearfix">
                <button type="button" class="btn btn-danger pull-left lnkLogin">BACK</button>
                <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
            </div>

        </form>


    </div>
    <!-- Forgot Div End Here -->

    <!-- Register Div Start Here -->
    <div class="login animated flipInY" id="registerDiv">
        <div class="text-center logo">
            <img src="{{URL::asset('assets/assetsAdmin/images/icon_app.png')}}" alt="logo">
            <span style="font-size: 25px"><strong>Cabi Cal</strong></span>
        </div>

        <form role="form" class="registerForm">

            <div class="form-group">
                <div class="input-icon">
                    <input type="text" class="form-control" name="register_fulName" placeholder="Full Name">
                </div>
            </div>

            <div class="form-group">
                <div class="input-icon">
                    <input type="email" class="form-control" name="register_email" placeholder="email@example.com">
                </div>
            </div>

            <div class="form-group">
                <div class="input-icon">
                    <input type="password" class="form-control" name="forgot_password" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <div class="input-icon">
                    <input type="password" class="form-control" name="forgot_cpassword" placeholder="Confirm Password">
                </div>
            </div>

            <div class="clearfix">
                <button type="button" class="btn btn-danger pull-left lnkLogin">BACK</button>
                <button type="submit" class="btn btn-primary pull-right">REGISTER</button>
            </div>

        </form>

    </div>
    <!-- Register Div End Here -->



<!--

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        { { csrf_field() }}

                        <div class="form-group{ { $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @ if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{ { $errors->first('email') }}</strong>
                                    </span>
                                @ endif
                            </div>
                        </div>


                        <div class="form-group{ { $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @ if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{ { $errors->first('password') }}</strong>
                                    </span>
                                @ endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{ { route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection

@section('script_section')

    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/jquery-2.2.4.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/plugins.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validation/localization/messages_fr.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/validation/additional-methods.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/js/page-login2.js')}}"></script>
    <script type="text/javascript" src="js/jquery_plugin/jquerywobblewindow.js"></script>

    <script>
        //$( '#registerDiv' ).wobbleWindow();
    </script>

@endsection

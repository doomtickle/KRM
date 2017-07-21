@extends('layouts.app')

@section('content')
    <div id="mid">
        <section class="hero is-fullheight is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <div class="columns login-container">
                        <div class="column is-4 is-offset-4">
                            <form class="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                @if ($errors->has('email'))
                                    <div class="notification is-danger">
                                        <p>{{ $errors->first('email') }}</p>
                                    </div>
                                @endif

                                @if ($errors->has('password'))
                                    <div class="notification is-danger">
                                        <p>{{ $errors->first('password') }}</p>
                                    </div>
                                @endif

                                <div class="field {{ $errors->has('email') ? ' is-danger' : '' }}">
                                    <div class="control has-icons-right">
                                        <input id="email" type="email" class="input is-large" name="email" value="{{ old('email') }}" required autofocus placeholder="email address">
                                        <span class="icon is-right">
                                          <i class="fa fa-envelope-o"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control has-icons-right">
                                        <input id="password" type="password" class="input is-large {{ $errors->has('password') ? ' is-danger' : '' }} input" name="password" required placeholder="password">
                                        <span class="icon is-right">
                                          <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column is-6">
                                        <div class="field">
                                            <div class="control">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="remember" class="is-large" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-6" style="text-align: right;">
                                        <a class="forgot-password" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                    </div>
                                </div>

                                <div class="field">
                                    <button type="submit" class="button button-block is-large is-info is-inverted is-outlined">Login</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

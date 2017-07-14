@extends('layouts.app')

@section('content')
    <div class="hero is-full space-background">
        <div class="hero-body">
            <div class="column is-offset-3 is-6">
                <div class="box login-box">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="column is-offset-3 is-6 field{{ $errors->has('email') ? ' is-danger' : '' }}">
                            <label for="email" class="label">E-Mail Address</label>
                            <p class="control">
                                <input id="email" type="email" class="input" name="email"
                                       value="{{ old('email') }}" required autofocus>
                            </p>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="field is-offset-3 column is-6">
                            <p class="control">
                                <label for="password" class="label">Password</label>
                                <input id="password" type="password"
                                       class="{{ $errors->has('password') ? ' is-danger' : '' }} input" name="password"
                                       required>
                            </p>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="field column is-offset-3 is-6">
                            <p class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember Me
                                </label>
                            </p>
                        </div>

                        <div class="field">
                            <div class="columns">
                                <div class="column is-offset-3 is-3">
                                    <button type="submit" class="button is-primary">
                                        Login
                                    </button>
                                </div>
                                <div class="column is-3">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

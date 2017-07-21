@extends('layouts.app')

@section('content')
    <div id="mid">
        <section class="hero is-fullheight is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <div class="columns login-container">
                        <div class="column is-4 is-offset-4">

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="control has-icons-right">
                                        <input id="email" type="email" class="input is-large" name="email" value="{{ old('email') }}" required placeholder="Email address">
                                        <span class="icon is-right">
                                          <i class="fa fa-envelope-o"></i>
                                        </span>
                                    </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="field">
                                    <button type="submit" class="button button-block is-large is-info is-inverted is-outlined">
                                        Send Password Reset Link
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

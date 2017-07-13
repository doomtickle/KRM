<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar main-nav">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <figure class="image">
                    <img src="{{ asset('img/kma-logo.png') }}" alt="KMA CRM" style=" margin-top: 20px;"
                         class="nav-logo">
                </figure>
            </a>
            <div class="navbar-burger burger" data-target="navMenuExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        @if(\Auth::check())
            <div id="navMenuExample" class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link is-active" href="{{ route('client.index') }}">
                            Clients
                        </a>
                        <div class="navbar-dropdown ">
                            <a class="navbar-item " href="{{ route('client.create') }}">
                                Add Client
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link " href="{{ route('task.index') }}">Tasks</a>
                        <div id="taskDropdown" class="navbar-dropdown " data-style="width: 18rem;">

                            <a class="navbar-item" href="{{ route('user.tasks', auth()->user()->id) }}">
                                My Tasks
                            </a>

                            <a class="navbar-item" href="{{ route('task.create') }}">
                                Add Task
                            </a>

                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable has-text-centered">
                        <a class="navbar-link" href="#" target="_blank">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="navbar-dropdown" data-style="width: 72rem;">
                            <a href="{{ route('logout') }}"
                               class="button is-danger"
                               onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

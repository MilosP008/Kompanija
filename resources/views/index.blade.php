@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">Kompanija</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur 
            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
            laborum.</p>
        @guest <!-- if(Auth::guest()) -->
            <a class="btn btn-primary btn-lg" href="/login" role="button">Prijava</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Registracija</a>
        @endguest
    </div>
@endsection
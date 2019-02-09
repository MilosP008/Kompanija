@extends('layouts.app')

@section('content')
    <?php $poslodavac = DB::table('poslodavac')->join('radnik', 'poslodavac.JMBG', '=', 'radnik.JMBG_poslodavca')->select('poslodavac.ime', 'poslodavac.prezime')->where('poslodavac.JMBG', $radnik->JMBG_poslodavca)->first(); ?>
    <div class="col-md-4">
        <a href="/radnici" class="btn btn-secondary" role="button">Nazad</a><br /><br />
        <h2 class="text-center">Radnik - {{$radnik->ime . " " . $radnik->prezime}}</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">JMBG: <span class="float-right">{{$radnik->JMBG}}</span></li>
            <li class="list-group-item">Ime: <span class="float-right">{{$radnik->ime}}</span></li>
            <li class="list-group-item">Prezime: <span class="float-right">{{$radnik->prezime}}</span></li>
            <li class="list-group-item">Godine: <span class="float-right">{{$radnik->godine}}</span></li>
            <li class="list-group-item">Datum zaspolenja: <span class="float-right">{{$radnik->datum_zaposlenja}}</span></li>
            <li class="list-group-item">Naziv radnog mesta: <span class="float-right">{{$radnik->naziv_radnog_mesta}}</span></li>
            <li class="list-group-item">Poslodavac: <span class="float-right">{{$poslodavac->ime . " " . $poslodavac->prezime}}</span></li>
        </ul>
        <br />
        @auth
            <a href="/radnici/{{$radnik->JMBG}}/edit" class="btn btn-primary" role="button">Izmeni</a>
            {!!Form::open(['action' => ['RadniciController@destroy', $radnik->JMBG], 'method' => 'POST', 'style' => 'display: inline-block;', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obrisi', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endauth
    </div>
@endsection
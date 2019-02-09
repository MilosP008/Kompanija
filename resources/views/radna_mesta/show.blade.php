@extends('layouts.app')

@section('content')
    <?php $radnici = DB::table('radnik')->join('radno_mesto', 'radnik.naziv_radnog_mesta', '=', 'radno_mesto.naziv')->select('radnik.ime', 'radnik.prezime', 'radnik.godine', 'radnik.datum_zaposlenja')->where('radnik.naziv_radnog_mesta', $radnoMesto->naziv)->get(); ?>
    <div class="col-md-6">
        <a href="/radnamesta" class="btn btn-secondary" role="button">Nazad</a><br /><br />
        <h2 class="text-center">Radno mesto - {{$radnoMesto->naziv}}</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Naziv: <span class="float-right">{{$radnoMesto->naziv}}</span></li>
            <li class="list-group-item">Radnici: <span class="float-right">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Godine</th>
                            <th scope="col">Datum zaposlenja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($radnici as $radnik)
                            <tr>
                                <td>{{$radnik->ime}}</td>
                                <td>{{$radnik->prezime}}</td>
                                <td>{{$radnik->godine}}</td>
                                <td>{{$radnik->datum_zaposlenja}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </span>
            </li>
        </ul>
        <br />
        @auth
            <a href="/radnamesta/{{$radnoMesto->naziv}}/edit" class="btn btn-primary" role="button">Izmeni</a>
            {!!Form::open(['action' => ['RadnaMestaController@destroy', $radnoMesto->naziv], 'method' => 'POST', 'style' => 'display: inline-block;', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obrisi', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endauth
    </div>
@endsection
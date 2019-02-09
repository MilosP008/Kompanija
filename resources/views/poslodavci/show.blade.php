@extends('layouts.app')

@section('content')
    <?php $radnici = DB::table('radnik')->join('poslodavac', 'radnik.JMBG_poslodavca', '=', 'poslodavac.JMBG')->select('radnik.ime', 'radnik.prezime', 'radnik.godine', 'radnik.datum_zaposlenja')->where('radnik.JMBG_poslodavca', $poslodavac->JMBG)->get(); ?>
    <div class="col-md-6">
        <a href="/poslodavci" class="btn btn-secondary" role="button">Nazad</a><br /><br />
        <h2 class="text-center">Poslodavac - {{$poslodavac->ime . " " . $poslodavac->prezime}}</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">JMBG: <span class="float-right">{{$poslodavac->JMBG}}</span></li>
            <li class="list-group-item">Ime: <span class="float-right">{{$poslodavac->ime}}</span></li>
            <li class="list-group-item">Prezime: <span class="float-right">{{$poslodavac->prezime}}</span></li>
            <li class="list-group-item">Godine: <span class="float-right">{{$poslodavac->godine}}</span></li>
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
            <a href="/poslodavci/{{$poslodavac->JMBG}}/edit" class="btn btn-primary" role="button">Izmeni</a>
            {!!Form::open(['action' => ['PoslodavciController@destroy', $poslodavac->JMBG], 'method' => 'POST', 'style' => 'display: inline-block;', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obrisi', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endauth
    </div>
@endsection
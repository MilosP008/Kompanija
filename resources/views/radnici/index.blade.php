@extends('layouts.app')

@section('content')
    <h2>Radnici</h2>
    @if(count($radnici))
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Godine</th>
                    <th scope="col">Datum zaposlenja</th>
                    <th scope="col">Naziv radnog mesta</th>
                    <th scope="col">Poslodavac</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($radnici as $radnik)
                    <?php $poslodavac = DB::table('poslodavac')->join('radnik', 'poslodavac.JMBG', '=', 'radnik.JMBG_poslodavca')->select('poslodavac.ime', 'poslodavac.prezime')->where('poslodavac.JMBG', $radnik->JMBG_poslodavca)->first(); ?>
                    <tr>
                        <td>{{$radnik->ime}}</td>
                        <td>{{$radnik->prezime}}</td>
                        <td>{{$radnik->godine}}</td>
                        <td>{{$radnik->datum_zaposlenja}}</td>
                        <td>{{$radnik->naziv_radnog_mesta}}</td>
                        <td>{{isset($poslodavac) ? $poslodavac->ime . " " . $poslodavac->prezime : ""}}</td>
                        <td class="float-right">
                            <a href="radnici/{{$radnik->JMBG}}" class="btn btn-secondary" role="button">Detalji</a>
                            @auth
                                <a href="radnici/{{$radnik->JMBG}}/edit" class="btn btn-primary" role="button">Izmeni</a>
                                {!!Form::open(['action' => ['RadniciController@destroy', $radnik->JMBG], 'method' => 'POST', 'style' => 'display: inline-block;'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Obrisi', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$radnici->links()}}
    @else
        <p>Nema radnika</p>
    @endif
@endsection
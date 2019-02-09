@extends('layouts.app')

@section('content')
    <h2>Radna mesta</h2>
    @if(count($radnaMesta))
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Naziv</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($radnaMesta as $radnoMesto)
                    <tr>
                        <td>{{$radnoMesto->naziv}}</td>
                        <td class="float-right">
                            <a href="radnamesta/{{$radnoMesto->naziv}}" class="btn btn-secondary" role="button">Detalji</a>
                            @auth
                                <a href="radnamesta/{{$radnoMesto->naziv}}/edit" class="btn btn-primary" role="button">Izmeni</a>
                                {!!Form::open(['action' => ['RadnaMestaController@destroy', $radnoMesto->naziv], 'method' => 'POST', 'style' => 'display: inline-block;'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Obrisi', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$radnaMesta->links()}}
    @else
        <p>Nema radnih mesta</p>
    @endif
@endsection
@extends('layouts.app')

@section('content')
    <h2>Poslodavci</h2>
    @if(count($poslodavci))
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Godine</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($poslodavci as $poslodavac)
                    <tr>
                        <td>{{$poslodavac->ime}}</td>
                        <td>{{$poslodavac->prezime}}</td>
                        <td>{{$poslodavac->godine}}</td>
                        <td class="float-right">
                            <a href="poslodavci/{{$poslodavac->JMBG}}" class="btn btn-secondary" role="button">Detalji</a>
                            @auth
                                <a href="poslodavci/{{$poslodavac->JMBG}}/edit" class="btn btn-primary" role="button">Izmeni</a>
                                {!!Form::open(['action' => ['PoslodavciController@destroy', $poslodavac->JMBG], 'method' => 'POST', 'style' => 'display: inline-block;'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Obrisi', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$poslodavci->links()}}
    @else
        <p>Nema poslodavaca</p>
    @endif
@endsection
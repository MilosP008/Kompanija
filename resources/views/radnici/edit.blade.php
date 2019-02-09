@extends('layouts.app')

@section('content')
    <h2>Izmenite informacije o radniku</h2>
    {!!Form::open(['action' => ['RadniciController@update', $radnik->JMBG], 'method' => 'POST'])!!}
        @csrf
        <div class="form-group">
            {{Form::label('ime', 'Ime')}}
            {{Form::text('ime', $radnik->ime, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('prezime', 'Prezime')}}
            {{Form::text('prezime', $radnik->prezime, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('godine', 'Godine')}}
            {{Form::text('godine', $radnik->godine, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('datum_zaposlenja', 'Datum zaposlenja')}}
            {{Form::date('datum_zaposlenja', $datumZaposlenja, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('radno_mesto', 'Naziv radnog mesta')}}
            @foreach($radnaMesta as $kljuc => $radnoMesto)
                @if($kljuc % 3 == 0)
                    <br />
                @endif
                {{Form::radio('radno_mesto', $radnoMesto->naziv, ($radnik->naziv_radnog_mesta == $radnoMesto->naziv) ? true : false)}}
                {{Form::label('radno_mesto', $radnoMesto->naziv, ['style' => 'margin-right: 10px;'])}}
            @endforeach
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Izmeni', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
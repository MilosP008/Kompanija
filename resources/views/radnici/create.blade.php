@extends('layouts.app')

@section('content')
    <h2>Unesi novog radnika</h2>
    {!!Form::open(['action' => 'RadniciController@store', 'method' => 'POST'])!!}
        @csrf
        <div class="form-group">
            {{Form::label('jmbg', 'JMBG')}}
            {{Form::text('jmbg', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('ime', 'Ime')}}
            {{Form::text('ime', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('prezime', 'Prezime')}}
            {{Form::text('prezime', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('godine', 'Godine')}}
            {{Form::text('godine', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('datum_zaposlenja', 'Datum zaposlenja')}}
            {{Form::date('datum_zaposlenja', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('radno_mesto', 'Radno mesto')}}
            @foreach($radnaMesta as $kljuc => $radnoMesto)
                @if($kljuc % 3 == 0)
                    <br />
                @endif
                    {{Form::radio('radno_mesto', $radnoMesto->naziv)}}
                    {{Form::label('radno_mesto', $radnoMesto->naziv, ['style' => 'margin-right: 10px;'])}}
            @endforeach
        </div>
        <div class="form-group">
            {{Form::label('poslodavac', 'Poslodavac')}}
            @foreach($poslodavci as $kljuc => $poslodavac)
                @if($kljuc % 3 == 0)
                    <br />
                @endif
                    {{Form::radio('poslodavac', $poslodavac->JMBG)}}
                    {{Form::label('poslodavac', $poslodavac->ime . " " . $poslodavac->prezime, ['style' => 'margin-right: 10px;'])}}
            @endforeach
        </div>
        {{Form::submit('Dodaj', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
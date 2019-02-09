@extends('layouts.app')

@section('content')
    <h2>Izmenite informacije o radnom mestu</h2>
    {!!Form::open(['action' => ['RadnaMestaController@update', $radnoMesto->naziv], 'method' => 'POST'])!!}
        @csrf
        <div class="form-group">
            {{Form::label('naziv', 'Naziv')}}
            {{Form::text('naziv', $radnoMesto->naziv, ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Izmeni', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
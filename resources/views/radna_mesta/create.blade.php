@extends('layouts.app')

@section('content')
    <h2>Unesi novo radno mesto</h2>
    {!!Form::open(['action' => 'RadnaMestaController@store', 'method' => 'POST'])!!}
        @csrf
        <div class="form-group">
            {{Form::label('naziv', 'Naziv')}}
            {{Form::text('naziv', '', ['class' => 'form-control'])}}
        </div>
        {{Form::submit('Dodaj', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
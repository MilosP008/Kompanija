@extends('layouts.app')

@section('content')
    <h2>Unesi novog poslodavca</h2>
    {!!Form::open(['action' => 'PoslodavciController@store', 'method' => 'POST'])!!}
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
        {{Form::submit('Dodaj', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
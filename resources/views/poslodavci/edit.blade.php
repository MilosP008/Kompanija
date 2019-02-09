@extends('layouts.app')

@section('content')
    <h2>Izmenite informacije o poslodavcu</h2>
    {!!Form::open(['action' => ['PoslodavciController@update', $poslodavac->JMBG], 'method' => 'POST'])!!}
        @csrf
        <div class="form-group">
            {{Form::label('ime', 'Ime')}}
            {{Form::text('ime', $poslodavac->ime, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('prezime', 'Prezime')}}
            {{Form::text('prezime', $poslodavac->prezime, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('godine', 'Godine')}}
            {{Form::text('godine', $poslodavac->godine, ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Izmeni', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection
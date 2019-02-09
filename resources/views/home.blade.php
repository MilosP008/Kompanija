@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Komandna tabla <span class="float-right">Prijavljeni ste!</span></div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="poslodavci/create" class="btn btn-success float-left">Unesi poslodavca</a>
                    <a href="radnici/create" class="btn btn-success">Unesi radnika</a>
                    <a href="radnamesta/create" class="btn btn-success float-right">Unesi radno mesto</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

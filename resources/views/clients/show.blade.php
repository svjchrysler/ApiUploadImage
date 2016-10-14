@extends('layout')
@section('header')
<div class="page-header">
        <h1>Clients / Show #{{$client->id}}</h1>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('clients.edit', $client->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="nombre">NOMBRE</label>
                     <p class="form-control-static">{{$client->nombre}}</p>
                </div>
                    <div class="form-group">
                     <label for="edad">EDAD</label>
                     <p class="form-control-static">{{$client->edad}}</p>
                </div>
                    <div class="form-group">
                     <label for="photo">PHOTO</label>
                     <p class="form-control-static">{{$client->photo}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('clients.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
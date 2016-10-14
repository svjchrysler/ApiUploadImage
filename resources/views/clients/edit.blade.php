@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Clients / Edit #{{$client->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ is_null(old("nombre")) ? $client->nombre : old("nombre") }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('edad')) has-error @endif">
                       <label for="edad-field">Edad</label>
                    <input type="text" id="edad-field" name="edad" class="form-control" value="{{ is_null(old("edad")) ? $client->edad : old("edad") }}"/>
                       @if($errors->has("edad"))
                        <span class="help-block">{{ $errors->first("edad") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('photo')) has-error @endif">
                       <label for="photo-field">Photo</label>
                    <input type="text" id="photo-field" name="photo" class="form-control" value="{{ is_null(old("photo")) ? $client->photo : old("photo") }}"/>
                       @if($errors->has("photo"))
                        <span class="help-block">{{ $errors->first("photo") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('clients.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-10">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach()
        </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Editar Usuario 
            </div>
            <div class="panel-body">
                <form action="{{ route('perfil.update', $user['idPersona']) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="Nom" id="name" class="form-control" value="{{ $user['Nom'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Cognom</label>
                        <div class="col-sm-10">
                            <input type="text" name="Cognom" id="email" class="form-control" value="{{ $user['Cognom'] }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Data Neixement</label>
                        <div class="col-sm-10">
                            <input type="text" name="dataNeixement" id="email" class="form-control" value="{{ $user['dataNeixement'] }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Sexe</label>
                        <div class="col-sm-10">
                            <input type="text" name="Sexe" id="email" class="form-control" "/>

                        </div>
                    </div>
                    <select class="custom-select">
                        <option selected>{{ $user['Sexe'] }}</option>
                        @foreach ($orientacions as $orientacio)
                            @if ( $user['Sexe'] != $orientacio['nom'] )
                                <option value="1"></option>
                            @endif
                        @endforeach
                    </select>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Editar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
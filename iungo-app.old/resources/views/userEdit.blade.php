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
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                           
                        </div>
                    </div>
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
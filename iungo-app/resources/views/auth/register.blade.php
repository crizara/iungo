@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrate</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cognom') ? ' has-error' : '' }}">
                            <label for="cognom" class="col-md-4 control-label">Cognom</label>

                            <div class="col-md-6">
                                <input id="cognom" type="text" class="form-control" name="cognom" value="{{ old('cognom') }}" required autofocus>

                                @if ($errors->has('cognom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cognom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!--nou-->
                         <div class="form-group{{ $errors->has('dataNeixement') ? ' has-error' : '' }}">
                            <label for="dataNeixement" class="col-md-4 control-label">Data de Neixement</label>

                            <div class="col-md-6">
                                <input id="dataNeixement" type="text" class="form-control" name="dataNeixement" value="{{ old('dataNeixement') }}" required autofocus>

                                @if ($errors->has('dataNeixement'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dataNeixement') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     

<!--nou-->
                        <div class="form-group{{ $errors->has('idSexe') ? ' has-error' : '' }}">
                            <label for="idSexe" class="col-md-4 control-label">Sexe</label>

                            <div class="col-md-6">
                                <input id="idSexe" type="text" class="form-control" name="idSexe" value="{{ old('idSexe') }}" required autofocus>

                                @if ($errors->has('idSexe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idSexe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!--nou-->
                         <div class="form-group{{ $errors->has('idBusca') ? ' has-error' : '' }}">
                            <label for="idBusca" class="col-md-4 control-label">Que buscas?</label>

                            <div class="col-md-6">
                                <input id="idBusca" type="text" class="form-control" name="idBusca" value="{{ old('idBusca') }}" required autofocus>

                                @if ($errors->has('idBusca'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idBusca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

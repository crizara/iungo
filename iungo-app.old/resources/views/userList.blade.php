@extends('layouts.app')



@section('content')



<section>
    <h1 class="lista">Lista de Usuarios</h1>
    <div class="color">
        <table class="table table-bordered">
            <thead>

                <tr>
                    <th >Id</th>
                    <th >Nombre</th>
                    <th >Email</th>
                    <th >Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($user as $users): ?>
                    <tr>
                        <td>{{ $users['id'] }} </td>
                        <td>{{ $users['name'] }} </td>
                        <td>{{ $users['email'] }}</td> 
                        <td> <a href="{{url('/eliminarUser', ['id' => $users['id']])}}"><i class="far fa-trash-alt"></i>

</a>
                        </td>  
                        <td>
                            <a href="{{ route('users.edit', $users['id']) }}"><i class="fas fa-user-edit"></i>

</a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<!--		<div class="tbl-content">
                        <table cellpadding="0" cellspacing="0" border="0">
                                
                        </table>
                </div>-->
</section>

@endsection

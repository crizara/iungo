<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Fixed table header</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link href="{{ asset('css/table.css') }}" rel="stylesheet"> 
</head>
<body>
	<section>
		<!--for demo wrap-->
		<h1>Lista de Usuarios</h1>
		<div class="tbl-header">
			<table cellpadding="0" cellspacing="0" border="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
		<div class="tbl-content">
			<table cellpadding="0" cellspacing="0" border="0">
				<tbody>
					<?php foreach ($user as $users): ?>
						<tr>
							<td>{{ $users['id'] }} </td>
							<td>{{ $users['name'] }} </td>
							<td>{{ $users['email'] }}</td> 
							<td> <a href="{{url('/eliminarUser', ['id' => $users->id])}}">Eliminar</a>
							<button>Editar</button>
							</td>     
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>

	<!-- follow me template -->
	<div class="made-with-love">
		Made with
		<i>♥</i> by
		<a target="_blank" href="https://codepen.io/nikhil8krishnan">Nikhil Krishnan</a>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="{{ asset('js/table.js') }}"></script>

</body>
</html>

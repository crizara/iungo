@extends('layouts.app')

@section('content')
 

<div>
	<?php foreach ($persona as $users): ?>
		<p>
			{{ $users['nom'] }} , {{ $users['cognom'] }}
			<br>
		</p>
	<?php endforeach ?>
</div>

@endsection

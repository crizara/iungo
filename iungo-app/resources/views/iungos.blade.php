@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-dark">
  
  <thead>
    <tr>
      <th scope="col"><strong>Persona que le gustas</strong></th>
      <th scope="col"><strong>Data Megusta</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($match as $user): ?>
    <tr>
      
      <td>{{$user->Nom}}</td>
        <td>{{ $user->data}}</td> 
    </tr>
   
   
     <?php endforeach ?>
  </tbody>
</table>


</div>

@endsection

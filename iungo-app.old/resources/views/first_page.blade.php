@extends('layouts.app')

@section('content')


<div class="cardcontainer list">
    <ul class="cardlist">
        <li class="card current">#1</li>
        <li class="card">#2</li>
        <li class="card">#3</li>
        <li class="card">#4</li>
        <li class="card">#5</li>
        <li class="card">#6</li>
    </ul>
    <button class="firstpage but-nope">X</button>
    <button class="firstpage but-yay">✔</button>
</div>








@endsection
<script src="{{ asset('js/firstpage.js') }}"></script>

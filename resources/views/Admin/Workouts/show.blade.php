@extends('layouts.app')
@section('content')
  <h2>Dettagli esercizio workout</h2>

  <div class="main_container">
    <div class="single_wo">
      <ul>
        <li><h3>Inserito da:</h3> <p>{{$workout->user->name}}</p></li>
        <li><h3>Indirizzo email:</h3> <p>{{$workout->user->email}}</p></li>
        <li><h3>{{$workout->name}}</h3></li>
        <li><img src="{{$workout->imgurl}}" alt=""></li>
        <li><h5>Description:</h5>
          <b>{{$workout->description}}</b>
        </li>
        <li><p>Reps: {{$workout->reps}}</p></li>
        <a href="{{ route('admin.workouts.index')}}">Torna alla home</a>
      </ul>
    </div>
  </div>
@endsection

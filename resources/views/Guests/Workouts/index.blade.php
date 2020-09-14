@extends('layouts.app')
@section('content')
  <h2>Ciao utente, qui di seguito i workout per te</h2>

  <div class="main_container">
    @foreach ($workouts as $workout)
      <div class="single_wo">
        <ul>
          <li><h3>{{$workout->name}}</h3></li>
          <li><img src="{{$workout->imgurl}}" alt=""></li>
          <li><a href="{{route('workout.show', $workout)}}">Mostra esercizio del WO</a></li>
        </ul>
      </div>
    @endforeach
  </div>
@endsection

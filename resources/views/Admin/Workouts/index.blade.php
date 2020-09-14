@extends('layouts.app')
@section('content')
  <h2>Ciao {{$logged_user->name}}, qui puoi consultare, modificare o eliminare i workout</h2>

  <div class="main_container">
    @foreach ($workouts as $workout)
      <div class="single_wo">
        <ul>
          <li><h3>{{$workout->name}}</h3></li>
          <li><img src="{{$workout->imgurl}}" alt=""></li>
          <li><a href="{{route('admin.workouts.show', $workout)}}">Mostra esercizio del WO</a></li>
          @if ($logged_user->id === $workout->user->id)
            <li><a href="{{route('admin.workouts.edit', $workout)}}">Modifica esercizio del WO</a></li>
          @endif
        </ul>
      </div>
    @endforeach
  </div>
@endsection

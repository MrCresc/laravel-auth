@extends('layouts.app')
@section('content')
  <h2>Crea il tuo workout</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Add new car form --}}
  <form action="{{route('admin.workouts.store')}}" method="post">
    @csrf
    @method('POST')
    <div>
      <select name="user_id">
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    {{-- <label>User ID:</label><br>
    <input type="text" name="user_id" value="{{ old('user_id')}}" placeholder="user_id"> --}}
    <br>
    <br>
    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name')}}" placeholder="name">
    <br>
    <br>
    <label>Url image:</label><br>
    <input type="text" name="imgurl" value="{{ old('imgurl')}}" placeholder="imgurl">
    <br>
    <br>
    <label>Description:</label><br>
    <input type="text" name="description" value="{{ old('description')}}" placeholder="description">
    <br>
    <br>
    <label>Reps:</label><br>
    <input type="text" name="reps" value="{{ old('reps')}}" placeholder="reps">
    <br>
    <br>
    <input type="submit" name="" value="save">
  </form>

  <a href="{{ route('admin.workouts.index')}}">Torna alla home</a>

@endsection

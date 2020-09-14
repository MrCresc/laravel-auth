@extends('layouts.app')
@section('content')

  @if ($logged_user->id === $workout->user->id)

    <h2>Modifica il workout</h2>

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
    <form action="{{route('admin.workouts.update',$workout)}}" method="post">
      @csrf
      @method('PUT')
      <div>
        <select name="user_id">
          @foreach ($users as $user)
            <option value="{{$user->id}}" {{ ( $user->id == $workout->user->id) ? 'selected' : '' }} >{{$user->name}}</option>
          @endforeach
        </select>
      </div>
      {{-- <label>User ID:</label><br>
      <input type="text" name="user_id" value="{{ old('user_id')}}" placeholder="user_id"> --}}
      <br>
      <br>
      <label>Name:</label><br>
      <input type="text" name="name" value="{{ isset($workout->name) ? $workout->name : old('name') }}" placeholder="name">
      <br>
      <br>
      <label>Url image:</label><br>
      <input type="text" name="imgurl" value="{{ isset($workout->imgurl) ? $workout->imgurl : old('imgurl') }}" placeholder="imgurl">
      <br>
      <br>
      <label>Description:</label><br>
      <input type="text" name="description" value="{{ isset($workout->description) ? $workout->description : old('description') }}" placeholder="description">
      <br>
      <br>
      <label>Reps:</label><br>
      <input type="text" name="reps" value="{{ isset($workout->reps) ? $workout->reps : old('reps') }}" placeholder="reps">
      <br>
      <br>
      <input type="submit" name="" value="save">
    </form>
  @endif


  <a href="{{ route('admin.workouts.index')}}">Torna alla home</a>

@endsection

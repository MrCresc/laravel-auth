<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;

class WorkoutController extends Controller
{
  public function index()
  {
    $workouts = Workout::all();
    return view('Guests.Workouts.index',compact('workouts'));
  }

  public function show(Workout $workout)
  {
    return view('Guests.Workouts.show',compact('workout'));
  }
}

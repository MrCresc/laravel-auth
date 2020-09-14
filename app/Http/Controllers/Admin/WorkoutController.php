<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Workout;
use App\User;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $logged_user = Auth::user();
      $workouts = Workout::all();
      return view('Admin.Workouts.index',compact('logged_user','workouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      return view('Admin.Workouts.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validazione
      $request->validate($this->validationData());

      $requested_data = $request->all();
      // dd($requested_data);

      // Nuova istanza Car
      $new_workout = new Workout();
      // $new_workout->user_id = $requested_data['user_id'];
      // $new_workout->name = $requested_data['name'];
      // $new_workout->imgurl = $requested_data['imgurl'];
      // $new_workout->description = $requested_data['description'];
      // $new_workout->reps = $requested_data['reps'];
      $new_workout->fill($requested_data);
      $new_workout->save();

      return redirect()->route('admin.workouts.index', $new_workout);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Workout $workout)
    {
      return view('Admin.Workouts.show',compact('workout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Workout $workout)
    {
      $logged_user = Auth::user();
      $users = User::all();
      return view('Admin.Workouts.edit',compact('workout','users','logged_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workout $workout)
    {
      $request->validate($this->validationData());
      $requested_data = $request->all();
      $workout->update($requested_data);

      return redirect()->route('admin.workouts.index', $workout);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workout $workout)
    {
      $workout->delete();
      return redirect()->route('admin.workouts.index');
    }

    public function validationData() {
      return [
        'name' => 'required|max:255',
        'imgurl' => 'required',
        'description' => 'required',
        'reps' => 'required|max:255',
      ];
    }
}

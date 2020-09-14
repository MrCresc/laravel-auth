<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Workout;

class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 10; $i++) {
        $new_workout = new Workout();
        $new_workout->user_id = 1;
        $new_workout->name = $faker->randomElement([
          'French Press','Squat','Lat Machine','Burpees','Pulley','Croci al cavo','Tapis roulant','Spinte in alto','Curl con manubri','Addominali'
        ]);
        $new_workout->imgurl = $faker->imageUrl();
        $new_workout->description = $faker->sentence();
        $new_workout->reps = rand(5, 15).'X'.rand(3, 9);
        $new_workout->save();
      }
    }
}

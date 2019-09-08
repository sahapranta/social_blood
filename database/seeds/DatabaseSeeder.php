<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->userDetails()->save(factory(App\UserDetails::class)->make());
            $user->bloodRequest()->save(factory(App\BloodRequest::class)->make());            
        });
        $users = App\User::pluck('id')->all();
        $numberOfUser = count($users);
        foreach(App\BloodRequest::all() as $blood_request){
            for ($i=0; $i < rand(0, $numberOfUser); $i++) { 
                $user = $users[$i];
                $blood_request->requestAccept()->attach($user);
            }
        }
    }
}

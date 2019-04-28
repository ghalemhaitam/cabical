<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleTableSeeder::class);
         $this->call(UserTableSeeder::class);
        // $this->call(UsersTableSeeder::class);

       // factory(App\Ville::class ,60)->create();
       // factory(App\Patient::class ,750)->create();
        factory(App\RendezVous::class ,600)->create();
    }
}

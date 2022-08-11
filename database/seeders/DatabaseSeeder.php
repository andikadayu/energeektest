<?php

namespace Database\Seeders;

use App\Models\Jobs;
use App\Models\Skills;
use App\Models\User;
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
        User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => md5('secret'),
        ]);

        $skils = ["PHP", "MySQL", "API"];
        foreach ($skils as $key => $value) {
            Skills::create([
                'name' => $value,
            ]);
        }

        $job = ["Full Stack Developer", "Front End Developer", "Back End Developer"];
        foreach ($job as $key => $value) {
            Jobs::create([
                'name' => $value,
            ]);
        }
    }
}

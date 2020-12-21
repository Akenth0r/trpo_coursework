<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: DELETE
        $admin = new User();
        $admin->fill(
            [
                'firstname' => 'admin',
                'surname' => 'admin',
                'login' => 'admin',
                'phone' => "+7 961 345 46 14",
                'email' => "admin@admin@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make("admin"), // password
                'remember_token' => Str::random(10),
                'priviledge' => 1
            ]
        )->save();

        User::factory()
            ->times(50)
            ->create();


    }
}

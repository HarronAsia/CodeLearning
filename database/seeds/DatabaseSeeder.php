<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123123123'),
                'dob' => Carbon::now(),
                'number' => '123123123',
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ]
        );
    }
}

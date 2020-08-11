<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Follower;


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

        DB::table('users')->insert(
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('123123123'),
                'dob' => Carbon::now(),
                'number' => '123123123',
                'role' => 'manager',
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ]
        );


        factory(User::class, 1000)->create();
        factory(Community::class, 10)->create();
        factory(Post::class, 10)->create();
        factory(Comment::class, 10)->create();
        factory(Like::class, 1000)->create();
        factory(Follower::class, 1000)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();
         \App\Models\Post::factory(100)->create();
    }
}
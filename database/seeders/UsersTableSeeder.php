<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; ++$i) {
            app(UserFactory::class)->create([]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(IndustrySeeder::class);

        User::factory()->count(1)->create();
        Company::factory()->count(10)->create();
        Address::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\LegalEntity;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LegalEntity::create([
            'name' => 'Pro Accounting Firm',
        ]);
        User::factory()->create([
            'first_name' => 'Vasya',
            'last_name' => 'Pupkin',
            'email' => 'test@pupkin.com',
            'legal_entity_id' => 1,
        ]);



        $this->call([
            CurrenciesTableSeeder::class,
            CountriesTableSeeder::class,
            LegalEntitiesSeeder::class,
            ContractsSeeder::class,
        ]);


    }
}

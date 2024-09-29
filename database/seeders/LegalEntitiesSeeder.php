<?php

namespace Database\Seeders;

use App\Models\LegalEntity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalEntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LegalEntity::factory()->count(10)->create();
    }
}

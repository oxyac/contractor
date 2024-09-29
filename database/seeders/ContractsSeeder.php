<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\LegalEntity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::factory()->count(10)->create();
    }
}

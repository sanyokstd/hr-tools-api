<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marital_values = ['married', 'unmarried', 'married', 'single'];
        foreach ($marital_values as $status) {
            MaritalStatus::factory()->create([
                'name' => $status,
            ]);
        }
    }
}

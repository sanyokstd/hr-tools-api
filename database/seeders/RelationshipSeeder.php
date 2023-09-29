<?php

namespace Database\Seeders;

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation_values = ['husband', 'wife', 'mother', 'father', 'brother', 'sister', 'other'];
        foreach ($relation_values as $relation) {
            Relationship::factory()->create([
                'name' => $relation,
            ]);
        }
    }
}

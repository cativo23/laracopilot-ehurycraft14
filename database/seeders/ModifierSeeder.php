<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modifier;
use App\Models\Item;

class ModifierSeeder extends Seeder
{
    public function run()
    {
        $modifiers = Modifier::factory()->count(20)->create();
        
        $items = Item::all();
        
        foreach ($items as $item) {
            $randomModifiers = $modifiers->random(rand(0, 3));
            $item->modifiers()->attach($randomModifiers);
        }
    }
}
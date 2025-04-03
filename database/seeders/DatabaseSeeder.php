<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\product::factory(20)->create();
        for ($i = 0; $i < 20; $i++) {
            \App\Models\product::create([
                'name'=>'mago',
                'price'=>10,
                'quantity'=> 5,
                'imagepath'=> 'products/b5sYRI2CwDwyOI2GkPlAoGJdXrPMn5K4UynfMTuT.jpg',
                'category_id'=> 5
            ]);
        }
        // User::factory(10)->create();
        // \App\Models\Admin::factory(3)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
        DB::table("products")->insert([
            'name'=>"grapes",
            'description'=>'',
            'price'=>15,
            'quantity'=> 100,
            'imagepath'=> 'assets\img\products/grapes.jpg',
            'category_id'=> 3
        ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'electrodomestico',
            'celulares',
            'laptops',
            'muebles',
            'tablets'
        ];
        foreach ($names as $name) {
            $c = new Category();
            $c->name = $name;
            $c->save();
        }
    }
}

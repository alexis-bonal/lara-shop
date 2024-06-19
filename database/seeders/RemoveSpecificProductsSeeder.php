<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class RemoveSpecificProductsSeeder extends Seeder
{
    public function run()
    {
        Product::where('name', 'LIKE', '%Brique%')->delete();
    }
}

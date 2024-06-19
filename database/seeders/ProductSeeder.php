<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Brique Rouge',
                'description' => 'Une brique rouge en argile.',
                'price' => 2.95,
                'image' => 'path/to/red_clay_brick.jpg',
                'quantity' => 100,
                'category' => 'argile'
            ],
            [
                'name' => 'Brique Bleue',
                'description' => 'Une brique bleue en plastique.',
                'price' => 2.55,
                'image' => 'path/to/blue_plastic_brick.jpg',
                'quantity' => 200,
                'category' => 'plastique'
            ],
            [
                'name' => 'Brique Verte',
                'description' => 'Une brique verte en bois.',
                'price' => 4.15,
                'image' => 'path/to/green_wood_brick.jpg',
                'quantity' => 150,
                'category' => 'bois'
            ],
            [
                'name' => 'Brique Jaune',
                'description' => 'Une brique jaune en argile.',
                'price' => 1.55,
                'image' => 'path/to/yellow_clay_brick.jpg',
                'quantity' => 100,
                'category' => 'argile'
            ],
            [
                'name' => 'Brique Violette',
                'description' => 'Une brique violette en plastique.',
                'price' => 3.55,
                'image' => 'path/to/purple_plastic_brick.jpg',
                'quantity' => 200,
                'category' => 'plastique'
            ],
            [
                'name' => 'Brique Orange',
                'description' => 'Une brique orange en bois.',
                'price' => 5.25,
                'image' => 'path/to/orange_wood_brick.jpg',
                'quantity' => 150,
                'category' => 'bois'
            ],
            [
                'name' => 'Brique Rose',
                'description' => 'Une brique rose en argile.',
                'price' => 2.25,
                'image' => 'path/to/pink_clay_brick.jpg',
                'quantity' => 100,
                'category' => 'argile'
            ],
            [
                'name' => 'Brique Blanche',
                'description' => 'Une brique blanche en plastique.',
                'price' => 2.35,
                'image' => 'path/to/white_plastic_brick.jpg',
                'quantity' => 200,
                'category' => 'plastique'
            ],
            [
                'name' => 'Brique Noire',
                'description' => 'Une brique noire en bois.',
                'price' => 3.55,
                'image' => 'path/to/black_wood_brick.jpg',
                'quantity' => 150,
                'category' => 'bois'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

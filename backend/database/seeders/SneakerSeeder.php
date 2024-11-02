<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SneakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sneakers = [
            [
                'title' => 'Nike Air Max 90',
                'price' => 120.00,
                'imageUrl' => '/sneakers/sneakers-1.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => true,
            ],
            [
                'title' => 'Adidas Yeezy Boost 350',
                'price' => 220.00,
                'imageUrl' => '/sneakers/sneakers-2.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => false,
            ],
            [
                'title' => 'Puma RS-X3',
                'price' => 110.00,
                'imageUrl' => '/sneakers/sneakers-3.jpg',
                'is_added_to_cart' => true,
                'is_favorite' => false,
            ],
            [
                'title' => 'New Balance 990v5',
                'price' => 175.00,
                'imageUrl' => '/sneakers/sneakers-4.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => true,
            ],
            [
                'title' => 'Converse Chuck Taylor',
                'price' => 55.00,
                'imageUrl' => '/sneakers/sneakers-5.jpg',
                'is_added_to_cart' => true,
                'is_favorite' => true,
            ],
            [
                'title' => 'Reebok Club C 85',
                'price' => 75.00,
                'imageUrl' => '/sneakers/sneakers-6.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => false,
            ],
            [
                'title' => 'Jordan Air Jordan 1',
                'price' => 150.00,
                'imageUrl' => '/sneakers/sneakers-7.jpg',
                'is_added_to_cart' => true,
                'is_favorite' => true,
            ],
            [
                'title' => 'Asics Gel-Lyte III',
                'price' => 100.00,
                'imageUrl' => '/sneakers/sneakers-8.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => true,
            ],
            [
                'title' => 'Under Armour HOVR Phantom',
                'price' => 130.00,
                'imageUrl' => '/sneakers/sneakers-9.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => false,
            ],
            [
                'title' => 'Fila Disruptor II',
                'price' => 85.00,
                'imageUrl' => '/sneakers/sneakers-10.jpg',
                'is_added_to_cart' => true,
                'is_favorite' => false,
            ],
            [
                'title' => 'Saucony Shadow 5000',
                'price' => 90.00,
                'imageUrl' => '/sneakers/sneakers-11.jpg',
                'is_added_to_cart' => false,
                'is_favorite' => true,
            ],
            [
                'title' => 'Vans Old Skool',
                'price' => 65.00,
                'imageUrl' => '/sneakers/sneakers-12.jpg',
                'is_added_to_cart' => true,
                'is_favorite' => true,
            ],
        ];

        DB::table('sneakers')->insert($sneakers);
    }
}
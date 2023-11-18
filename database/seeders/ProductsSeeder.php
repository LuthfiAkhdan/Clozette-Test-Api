<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category_id' => 1,
                'sku' => 'SKU000001',
                'name' => 'Product One',
                'price' => 100000,
                'stock' => 20,
            ],
            [
                'category_id' => 2,
                'sku' => 'SKU000002',
                'name' => 'Product Two',
                'price' => 50000,
                'stock' => 20,
            ],
            [
                'category_id' => 3,
                'sku' => 'SKU000003',
                'name' => 'Product Three',
                'price' => 60000,
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'sku' => 'SKU000004',
                'name' => 'Product A',
                'price' => 150000,
                'stock' => 0,
            ],
            [
                'category_id' => 3,
                'sku' => 'SKU000005',
                'name' => 'Product B',
                'price' => 120000,
                'stock' => 15,
            ],
        ];

        foreach($data as $key=>$value){
            Product::create([
                'category_id' => $value['category_id'],
                'sku' => $value['sku'],
                'name' => $value['name'],
                'price' => $value['price'],
                'stock' => $value['stock'],
            ]);
        }
    }
}

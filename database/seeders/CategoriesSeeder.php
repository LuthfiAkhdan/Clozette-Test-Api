<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category_name' => 'Product One',
            ],
            [
                'category_name' => 'Product Two',
            ],
            [
                'category_name' => 'Product Three',
            ],
        ];

        foreach($data as $key=>$value){
            Category::create([
                'category_name' => $value['category_name'],
            ]);
        }
    }
}

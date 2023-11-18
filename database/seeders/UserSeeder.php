<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach($data as $key=>$value){
            User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password'],
            ]);
        }
    }
}

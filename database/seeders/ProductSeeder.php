<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Orange Paint Card',
                'description' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'price' => '50000',
                'stock' => '16'
                
            ],
            [
                'name' => 'Tea Cup Art',
                'description' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'price' => '35000',
                'stock' => '60'
                
            ],
            [
                'name' => 'Leg Tattoo Paint',
                'description' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'price' => '65000',
                'stock' => '36'
                
            ]
        ]);
        
    }
}

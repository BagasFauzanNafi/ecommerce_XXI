<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                "name"=>"Action",
                "icons"=>null
            ],
            [
                "name"=>"Adventure",
                "icons"=>null
            ],
            [
                "name"=>"Comedy",
                "icons"=>null
            ],
            [
                "name"=>"Drama",
                "icons"=>null
            ],
            [
                "name"=>"horror",
                "icons"=>null
            ],
            [
                "name"=>"Science",
                "icons"=>null
            ],
            [
                "name"=>"Fiction",
                "icons"=>null
            ],
            [
                "name"=>"Thriller",
                "icons"=>null
            ],
        ];
        //insert data to table categories
        foreach($categories as $category){
            Category::create([
                "name" => $category["name"],
                "icons" => $category["icons"],
            ]);
        }
    }
}

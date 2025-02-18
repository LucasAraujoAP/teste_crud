<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Cria uma instância do Faker
        $faker = Faker::create();

        // Define quantos produtos você quer criar
        $numberOfProducts = 20;

        // Loop para criar produtos
        for ($i = 0; $i < $numberOfProducts; $i++) {
            Product::create([
                'name' => $faker->word, // Gera uma palavra aleatória
                'sku' => $faker->unique()->numberBetween(1000, 9999), // Gera um SKU único
                'value' => $faker->randomFloat(2, 10, 1000), // Gera um valor entre 10 e 1000 com 2 casas decimais
            ]);
        }
    }
}

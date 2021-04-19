<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //ProduitSeeder::class,
            CategorieSeeder::class,
            RoleSeeder::class,
        ]);
        // \App\Models\Produit::factory(50)->create();
        // \App\Models\User::factory(10)->create();
    }
}

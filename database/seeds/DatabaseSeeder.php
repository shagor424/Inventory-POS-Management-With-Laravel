<?php

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

        	UsersTableSeeder::class,
            BrandsTableSeeder::class,
        	ProductsTableSeeder::class,
            CatagoriesTableSeeder::class,
            SubCatagoriesTableSeeder::class,
            SubSubCatagoriesTableSeeder::class,
        ]);
    }
}

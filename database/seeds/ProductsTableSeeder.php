<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

        foreach(range(1,25) as $index){
        	$name= $faker->sentence;
        	Product::create([
        		   'product_name' =>$name,
        		   'product_slug' =>$this->slug_generator($name),
		           'catagory_id' => rand(1,10),
		           'sub_catagory_id' => rand(1,20),
		           'sub_sub_catagory_id' => rand(1,30),
		           'brand_id' => rand(10,20),
		           'model' => $faker->name,
		           'size' => $faker->name,
		           'quantity' => rand(10,20),
		           'buy_price'=> rand(100,100),
		           'sell_price'=> rand(110,150),
		           'special_price'=> rand(50,100),
		           'special_start' => $faker->date,
		           'special_end' => $faker->date,
		           'thumbail' => 'null',
		           'image' => 'null',
		           'color' => $faker->name,
		           'product_id' => rand(000000,999999),
		           'video' => 'null',
		           'warrenty' => 0, 
		           'warrenty_time' => $faker->date,
		           'warrenty_condition' => $faker->name,
		           'short_des' => $faker->name,
		           'long_des' => $faker->name,
		           'status' => 1,
		        	]);
        }
    }

   
     public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }

}

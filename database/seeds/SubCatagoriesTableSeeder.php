<?php

use Illuminate\Database\Seeder;
use App\Model\SubCatagory;
class SubCatagoriesTableSeeder extends Seeder
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
        	$subcatagory= $faker->name;
        	SubCatagory::create([

                'catagory_id' =>rand(1,10),
        		'sub_catagory_name' =>$subcatagory,
        		'sub_catagory_slug' =>$this->slug_generator($subcatagory),
        		'status' =>rand(1),
        	]);
        }
    }

   
     public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }
}

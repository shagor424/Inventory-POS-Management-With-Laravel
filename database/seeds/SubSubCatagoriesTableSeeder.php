<?php

use Illuminate\Database\Seeder;
use App\Model\SubSubCatagory;
class SubSubCatagoriesTableSeeder extends Seeder
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
        	$subsubcatagory= $faker->name;
        	SubSubCatagory::create([
                'catagory_id' =>rand(1,10),
                'sub_catagory_id' =>rand(1,10),
        		'sub_sub_catagory_name' =>$subsubcatagory,
        		'sub_sub_catagory_slug' =>$this->slug_generator($subsubcatagory),
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

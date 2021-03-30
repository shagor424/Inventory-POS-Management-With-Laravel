<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Product extends Model
{
		protected $fillable = [
				       'product_name',
        		   'product_code',
		           'category_id',
		           'sub_category_id',
		           'sub_sub_category_id',
		           'brand_id',
		           'supplier_id',
		           'unit_id',
		           'size',
		           'color',
               'model',
               'status',
		           
	];


      public function category(){
      	return $this->belongsTo(Category::class, 'category_id', 'id');
      }

      public function subcategory(){
      	return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
      }

      public function subsubcategory(){
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id', 'id');
      }

      public function brand(){
      	return $this->belongsTo(Brand::class, 'brand_id', 'id');
      }

       public function unit(){
      	return $this->belongsTo(Unit::class, 'unit_id', 'id');
      }

       public function supplier(){
      	return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
      }

      public function user(){
      	return $this->belongsTo(user::class, 'id', 'id');
      }

     

}

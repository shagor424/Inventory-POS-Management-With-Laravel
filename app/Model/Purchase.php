<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
				   'product_id',
        		   'purchase_no',
		           'category_id',
		           'sub_category_id',
		           'sub_sub_category_id',
		           'brand_id',
		           'supplier_id',
		           'unit_id',
		           'quantity' ,
		           'unit_price',
		           'buy_price',
		           'purchase_date',
		           'warranty_time',
		           'description',
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

      public function product(){
      	return $this->belongsTo(Product::class, 'product_id', 'id');
      }

       public function model(){
        return $this->belongsTo(Product::class, 'model', 'id');
      }

      public function size(){
        return $this->belongsTo(Product::class, 'size', 'id');
      }


}

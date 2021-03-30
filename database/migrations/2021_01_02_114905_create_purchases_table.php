<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; 

class CreatePurchasesTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->string('purchase_no')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('sub_sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('size')->nullable();
            $table->integer('model')->nullable();
            $table->integer('color')->nullable();
            $table->double('buy_quantiy')->nullable();
            $table->decimal('unit_price')->nullable();
            $table->decimal('buy_price')->nullable();
            $table->decimal('sell_price')->nullable();
            $table->string('warranty_time')->nullable();
            $table->date('purchase_date')->nullable();
             $table->string('description')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=pending,1=Approved');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}

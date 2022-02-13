<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->date('invoice_date')->nullable();
            $table->date('customer_date')->nullable();
            $table->integer('product_code')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('sub_sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('size')->nullable();
            $table->integer('model')->nullable();
            $table->integer('color')->nullable();
            $table->integer('warrany_time')->nullable();
            $table->double('selling_quantity')->nullable();
            $table->decimal('unit_price',10,2)->nullable();
            $table->decimal('selling_price',10,2)->nullable();
            $table->tinyinteger('status')->default(1);
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
        Schema::dropIfExists('invoice_details');
    }
}

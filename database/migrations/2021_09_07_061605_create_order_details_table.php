<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('order_id');
            $table->bigInteger('order_no');

            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('customer_id_no')->nullable();
            $table->bigInteger('supplier_id')->nullable();
            $table->bigInteger('supplier_id_no')->nullable();

            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('product_type_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('product_unit_id')->nullable();

            $table->double('product_unit_supplier_price', 8, 2)->default(0.00);
            $table->double('product_unit_max_retail_price', 8, 2)->default(0.00);
            $table->double('product_unit_discount_amount', 8, 2)->default(0.00);
            $table->double('product_unit_discount_percentage', 8, 2)->default(0.00);
            $table->double('product_unit_discount_price', 8, 2)->default(0.00);

            $table->integer('order_quantity')->default(1);
            $table->integer('available_stock_after_order')->nullable();

            $table->double('sub_total_product_unit_supplier_price', 8, 2)->default(0.00);
            $table->double('sub_total_product_unit_max_retail_price', 8, 2)->default(0.00);
            $table->double('sub_total_product_unit_discount_amount', 8, 2)->default(0.00);
            $table->double('sub_total_product_unit_discount_price', 8, 2)->default(0.00);



            $table->string('manufacture_date')->nullable();
            $table->string('expiration_date')->nullable();

            $table->string('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();

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
        Schema::dropIfExists('order_details');
    }
}

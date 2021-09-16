<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_costs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('payable_amount', 8, 2)->default(0.00);
            $table->double('paid_amount', 8, 2)->default(0.00);
            $table->double('due_amount', 8, 2)->default(0.00);

            $table->string('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('created_by');
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
        Schema::dropIfExists('other_costs');
    }
}

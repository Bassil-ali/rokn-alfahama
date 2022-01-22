<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('offer_id')->nullable();
            $table->text('image')->nullable();
            // $table->integer('quantity')->default(0);

            $table->integer('free_quantity')->default(0);
            $table->double('item_price')->default(0);
            $table->double('item_quantity')->default(0);
            $table->double('tax_percentage')->default(0);
            $table->double('discount')->default(0);
            $table->boolean('is_discount_percentage')->default(true);
            $table->string('item_name')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}

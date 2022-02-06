<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->double('amount');
            $table->dateTime('date');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->unsignedBigInteger('main_currency_id')->nullable();
            $table->double('conversion_factor')->default(1);
            $table->double('main_currency_amount');
            $table->string('currency')->nullable();
            $table->string('main_currency')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('payments');
    }
}

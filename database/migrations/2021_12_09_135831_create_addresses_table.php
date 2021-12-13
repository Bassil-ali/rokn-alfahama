<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('title_name')->nullable();
                $table->string('area')->nullable();
                $table->string('widget')->nullable();
                $table->string('street')->nullable();
                $table->string('avenue')->nullable();
                $table->string('house_number')->nullable();
                $table->string('floor_no')->nullable();
                $table->string('apartment_number')->nullable();
                $table->string('notes')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}

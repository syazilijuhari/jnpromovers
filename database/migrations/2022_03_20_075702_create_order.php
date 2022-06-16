<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->string('order_id')->primary();
            $table->string('name');
            $table->foreign('name')->references('name')->on('users');
            $table->string('package');
            $table->dateTime('booking_datetime');
            // Location
            $table->decimal('fromLat', 11, 8);
            $table->decimal('fromLong', 11, 8);
            $table->decimal('toLat', 11, 8);
            $table->decimal('toLong', 11, 8);
            // Address
            $table->string('address_from', 255);
            $table->string('address_to', 255);

            $table->string('vehicle_type');
            $table->string('extra_service');
            $table->text('note')->nullable();
            $table->string('photo', 255);
            $table->decimal('price', 10,2);
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('order');
    }
}

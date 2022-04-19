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
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('address_from', 255);
            $table->string('address_to', 255);
            $table->string('vehicle_type');
            $table->string('extra_service');
            $table->text('note');
            $table->string('photo', 255);
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->string('payment_status');
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

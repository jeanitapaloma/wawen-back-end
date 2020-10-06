<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('status')->default('pending');
            $table->string('label');
            $table->string('confirmed_delivery_date')->nullable();
            $table->string('confirmed_delivery_time')->nullable();
            $table->string('choosen_delivery_date');
            $table->string('choosen_delivery_time');
            $table->string('payment');
            $table->string('active_contact');
            $table->string('reciever_name');
            $table->string('delivery_address');
            $table->string('customer_message')->nullable();
            $table->string('admin_remarks')->nullable();
            $table->double('total_amount');
            $table->double('delivery_fee');
            $table->double('overall_payment');
            $table->timestamp('completed_date')->nullable();
            $table->timestamp('cancelled_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

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
            $table->string('date');
            $table->string('code')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('postalCode');
            $table->string('phone');
            $table->text('notes')->nullable();
            $table->string('price');
            $table->string('prepayment');
            $table->string('remainPrice');
            $table->text('products_id')->nullable();
            $table->enum('status',['delivered','completing','pending']);
            $table->string('track_id')->unique();
            $table->string('transaction_id')->unique();
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

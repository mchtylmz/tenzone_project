<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->enum('type', ['store', 'plan'])->default('store');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->decimal('total');
            $table->longText('products');
            $table->longText('stripe')->nullable();
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
};

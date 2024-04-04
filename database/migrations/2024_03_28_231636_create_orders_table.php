<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Equivalente a bigIncrements('id')
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->nullOnDelete();
            $table->text('name')->nullable();
            $table->string('email', 128)->unique();
            $table->string('address', 256);
            $table->bigInteger('phone_num', false, true)->unsigned();
            $table->double('total', 6, 2)->unsigned();
            $table->string('status', 128);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

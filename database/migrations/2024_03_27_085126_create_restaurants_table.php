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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->string('name', 256);
            $table->string('slug')->nullable();
            $table->string('address', 256);
            $table->unsignedBigInteger('iva')->unique(); //da verificare lunghezza (11)
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            if (Schema::hasColumn('restaurants', 'user_id')) {

                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};

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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lessor_id')->constrained('lessors','id')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories','id')->cascadeOnDelete();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('address');
            $table->decimal('price_per_full_day',8,2);
            $table->boolean('availability')->default(true);
            $table->integer('capacity')->nullable();
            $table->string('image');
            $table->enum('auth', ['pending', 'certified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index()->constrained('products')->cascadeOnDelete();
            $table->foreignId('location_id')->index()->constrained('locations')->cascadeOnDelete();
            $table->integer('stock')->default(0);
            $table->foreignId('type_id')->index()->constrained('types')->cascadeOnDelete();
            $table->integer('price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_models');
    }
};

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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('qty')->default(0);
            $table->integer('price')->default(0);
            $table->foreignId('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->foreignId('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
            $table->foreignId('location_id')->references('id')->on('location')->onDelete('cascade');
            $table->integer('total_price')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_models');
    }
};

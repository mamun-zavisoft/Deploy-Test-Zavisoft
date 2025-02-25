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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->foreignId('zone_id')->nullable()->constrained();
            $table->bigInteger('purchase_price');
            $table->bigInteger('sale_price');
            $table->text('description')->nullable();
            $table->bigInteger('total_available_qty')->default(0);
            $table->boolean('status')->default(1)->comment('1=active, 0=inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

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
        $table->id();                       // Product ID
        $table->string('name');             // Product name
        $table->text('description')->nullable();  // Description (optional)
        $table->decimal('price', 10, 2);    // Price
        $table->string('image')->nullable(); // Image filename (optional)
        $table->timestamps();               // Created_at & updated_at
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

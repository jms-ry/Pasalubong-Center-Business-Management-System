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
            $table->unsignedBigInteger('supplier_id');
            $table->string('bar_code');
            $table->string('name');
            $table->text('description');
            $table->enum('unit', ['pack', 'piece', 'bottle', 'box']);
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->dateTime('restock_date')->nullable();
            $table->timestamps();
        
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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

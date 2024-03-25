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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('quantity');
            $table->dropColumn('total_cost');
            $table->dropColumn('product_id');
            $table->unsignedBigInteger('user_id')->after('customer_id'); 
            $table->decimal('total', 10, 2)->after('customer_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('quantity');
            $table->decimal('total_cost', 10, 2);
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('total');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
};

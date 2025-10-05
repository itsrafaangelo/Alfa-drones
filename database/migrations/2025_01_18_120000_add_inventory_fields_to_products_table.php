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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('sold_quantity')->default(0)->after('stock_quantity');
            $table->integer('min_stock_level')->default(10)->after('sold_quantity');
            $table->decimal('cost_price', 10, 2)->nullable()->after('sale_price');
            $table->string('sku')->unique()->nullable()->after('slug');
            $table->string('barcode')->nullable()->after('sku');
            $table->enum('status', ['ativo', 'inativo', 'descontinuado'])->default('ativo')->after('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sold_quantity',
                'min_stock_level',
                'cost_price',
                'sku',
                'barcode',
                'status'
            ]);
        });
    }
};

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
            $table->id('order_id');
                $table->string('customername')->nullable()->default(null);
                $table->string('order_name')->nullable()->default(null);
                $table->string('image_link')->nullable()->default(null);
                $table->integer('quantity')->nullable()->default(null);
                $table->float('price')->nullable()->default(null);
                $table->float('final_price')->nullable()->default(null);
                $table->string('status')->nullable()->default(null);
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

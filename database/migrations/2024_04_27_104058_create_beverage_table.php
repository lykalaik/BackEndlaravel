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
        Schema::create('beverage', function (Blueprint $table) {
            $table->id('beverage_id');
            $table->string('beverage_name')->nullable()->default(null);
            $table->string('beverage_size')->nullable()->default(null);
            $table->string('image_link')->nullable()->default(null);
            $table->string('price')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beverage');
    }
};

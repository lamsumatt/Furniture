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
        Schema::create('product_admin', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_name')->unique();
            $table->string('product_description');
            $table->string('slug_product');
            $table->integer('activated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_admin');
    }
};

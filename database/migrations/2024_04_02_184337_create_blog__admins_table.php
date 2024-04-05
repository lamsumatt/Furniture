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
        Schema::create('blog_admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_blog');
            $table->string('name_admin');
            $table->string('description');
            $table->string('image');
            $table->string('summary');
            $table->dateTime('day_update');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_admins');
    }
};

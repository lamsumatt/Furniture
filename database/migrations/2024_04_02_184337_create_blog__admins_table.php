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
            $table->string('name_blog')->unique();
            $table->string('name_admin');
            $table->text('summary_content');
            $table->string('image');
            $table->longtext('summary');
            $table->dateTime('day_update')->default(now());
            $table->integer('activated');
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

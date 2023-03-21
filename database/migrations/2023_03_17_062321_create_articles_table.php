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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('id');
            $table->string('Title');
            $table->string('Code');
            $table->text('Contents');
            $table->string('Author');
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id('id');
            $table->string('TagName');
            $table->string('Code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('tags');
    }
};

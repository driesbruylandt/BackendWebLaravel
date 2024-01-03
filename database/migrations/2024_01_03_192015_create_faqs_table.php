<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Copy the schema definition from your Closure-based migration
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('question', 255);
            $table->text('answer');
            $table->foreignId('category_id')->constrained('faq_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
}


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
        Schema::create('art_work_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('art_work_id')->constrained('art_works')->onDelete('cascade');
            $table->foreignId('collection_id')->constrained('collections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_work_collections');
    }
};

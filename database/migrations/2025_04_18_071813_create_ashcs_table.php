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
        Schema::create('ashcs', function (Blueprint $table) {
            $table->id();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('objectives')->nullable();
            $table->string('committee_convenor')->nullable();
            $table->text('committee_members')->nullable();
            $table->string('title')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ashcs');
    }
};

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
        Schema::create('admissioncommittees', function (Blueprint $table) {
            $table->id();
            $table->string('vision')->nullable();
            $table->string('mission')->nullable();
            $table->string('objectives')->nullable();
            $table->string('committee_convenor')->nullable();
            $table->string('committee_members')->nullable();
            $table->string('report_path')->nullable();
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
        Schema::dropIfExists('admissioncommittees');
    }
};

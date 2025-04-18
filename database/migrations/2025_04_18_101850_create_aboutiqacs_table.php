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
        Schema::create('aboutiqacs', function (Blueprint $table) {
            $table->id();
            $table->text('aboutiqac')->nullable();
            $table->string('iqacestb')->nullable();
            $table->string('iqacco')->nullable();
            $table->text('iqacform')->nullable();
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
        Schema::dropIfExists('aboutiqacs');
    }
};

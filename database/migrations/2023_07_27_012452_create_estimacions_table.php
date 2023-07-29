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
        Schema::create('estimaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->enum('valor', ['xs', 's', 'm', 'l', '?'])->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimacions');
    }
};

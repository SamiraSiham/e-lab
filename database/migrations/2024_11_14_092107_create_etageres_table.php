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
        Schema::create('etageres', function (Blueprint $table) {
            $table->id();
            $table->string('num_etagere');
            $table->foreignId('salle_id')->references("id")->on('salles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('placard_id')->references("id")->on('placards')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etageres');
    }
};

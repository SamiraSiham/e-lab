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
        Schema::create('enseigner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salle_id')->references("id")->on('salles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('module_id')->references("id")->on("modules")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type_cours');
            $table->date('date_deroulement');
            $table->time('heure_debut', precision: 0);
            $table->time('heure_fin', precision: 0);
            $table->text("Support")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseigner');
    }
};

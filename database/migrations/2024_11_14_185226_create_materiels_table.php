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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('index_FP_VF')->nullable();
            $table->string('etablissement')->nullable()->default('ENS Rabat Siege');
            $table->string('bloc')->nullable()->default('labo physique');
            $table->string('service')->nullable()->default('Dpt physique');
            $table->string('nom_responsable')->nullable()->default('MME HAFIDA ESSSAQOTE');
            $table->string('cab')->nullable();
            $table->string('famille')->nullable();
            $table->string('sous_famille')->nullable();
            $table->string('designation')->nullable();
            $table->integer('quantite')->nullable();
            $table->decimal('prix_unitaire')->nullable();
            $table->string('marque')->nullable();
            $table->string('modele')->nullable();
            $table->string('num_serie')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('etat')->nullable();
            $table->date('date_achat')->nullable();
            $table->string('commentaire')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('salle_id')->references("id")->on('salles')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('placard_id')->references("id")->on('placards')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('etagere_id')->references("id")->on('etageres')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};

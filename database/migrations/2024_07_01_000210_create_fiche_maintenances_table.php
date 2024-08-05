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
        Schema::create('fiche_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('numero_maintenance')->unique();
            $table->date('date_heure_entree');
            $table->date('date_heure_sortie');
            $table->integer('kilometrage');
            $table->string('declaration_utilisateur');
            $table->string('obsrvation_controleur');
            $table->string('inspection_reception');
            $table->string('inspection_livraison');
            $table->string('travaux_execute');
            $table->enum('etat_fiche', ['en cours', 'termine']);
            $table->foreignId('id_chauffeur')->constrained(table :'chauffeurs');
            $table->foreignId('id_vehicule')->constrained(table :'vehicules');
            $table->foreignId('id_mecanicien')->constrained(table :'mecaniciens');
            $table->foreignId('id_garage')->constrained(table :'garages');
            $table->timestamps();
            
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_maintenances');
    }
};

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
            $table->date('date_entree');
            $table->date('date_sortie');
            $table->integer('index');
            $table->string('declaration_utilisateur');
            $table->string('obsrvation_controleur');
            $table->string('inspection_reception');
            $table->string('inspection_livraison');
            $table->string('travaux_execute');
            $table->enum('etat_fiche', ['en_cours', 'termine']);
            $table->foreignId('id_chauffeur')->constrained(table :'chauffeurs');
            $table->foreignId('id_vehicule')->constrained(table :'vehicules');
            $table->foreignId('id_mecanicien')->constrained(table :'mecaniciens');
            $table->foreignId('id_user')->constrained(table :'users');
            $table->timestamps();
            
            $table->softDeletes();
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

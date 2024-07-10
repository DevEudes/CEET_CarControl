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
        Schema::create('fiche_sorties', function (Blueprint $table) {
            $table->id();
            $table->date('date_demande');
            $table->string('objet_demande');
            $table->string('nom_demandeur');
            $table->date('date_heure_depart');
            $table->date('date_heure_retour');
            $table->integer('index_depart');
            $table->integer('index_retour');
            $table->string('etat_depart');
            $table->enum('etat_retour', ['bon_etat', 'etat_passable', 'mauvais_etat']);
            $table->double('estimation_besoin_carburant');
            $table->integer('estimation_nombre_kilometre');
            $table->string('observation_depart')->nullable();
            $table->string('observation_retour')->nullable();
            $table->enum('etat_fiche', ['en_cours', 'termine']);
            $table->foreignId('id_type_sortie')->constrained(table: 'type_sorties');
            $table->foreignId('id_type_appvnmt')->constrained(table: 'type_approvisionnements');
            $table->foreignId('id_chauffeur')->constrained(table: 'chauffeurs');
            $table->foreignId('id_vehicule')->constrained(table: 'vehicules');
            $table->foreignId('id_user')->constrained(table: 'users');
            $table->foreignId('id_departement')->constrained(table: 'departements');
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
        Schema::dropIfExists('fiche_sorties');
    }
};

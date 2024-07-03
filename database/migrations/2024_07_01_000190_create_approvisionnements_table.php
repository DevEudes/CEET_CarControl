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
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->enum('motif_appvnmt', ['mission', 'feuille_de_route', 'reapprovisionnement']);
            $table->string('centre_cout_machine')->nullable();
            $table->string('depense_engagement_concedent')->nullable();
            $table->string('numero_ot')->nullable();
            $table->enum('type_produit', ['essence', 'gasoil']);
            $table->date('date_depart');
            $table->date('date_retour');
            $table->integer('index_depart');
            $table->integer('index_retour');
            $table->integer('solde_carte_depart')->nullable();
            $table->integer('solde_carte_retour')->nullable();
            $table->double('quantite');
            $table->double('taux_consommation');
            $table->integer('numero_bon_carburant')->unique()
                                                ->nullable();
            $table->integer('numero_bon_sortie_produit_petrolier')->unique()
                                                                ->nullable();
            $table->integer('numero_transaction')->unique()
                                            ->nullable();
            $table->enum('etat_fiche', ['en_cours', 'termine']);
            $table->foreignId('id_type_approvisionnement')->constrained(table :'type_approvisionnements');
            $table->foreignId('id_chauffeur')->constrained(table :'chauffeurs');
            $table->foreignId('id_vehicule')->constrained(table :'vehicules');
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
        Schema::dropIfExists('approvisionnements');
    }
};

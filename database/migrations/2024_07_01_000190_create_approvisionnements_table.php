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
            $table->string('numero_appvnmt')->unique();
            $table->enum('motif_appvnmt', ['mission', 'feuille_de_route', 'reapprovisionnement']);
            $table->enum('type_produit', ['essence', 'gasoil']);
            $table->double('quantite');
            $table->double('taux_consommation');
            $table->enum('etat_fiche', ['en_cours', 'termine']);
            $table->foreignId('id_chauffeur')->constrained(table :'chauffeurs');
            $table->foreignId('id_vehicule')->constrained(table :'vehicules');
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
        Schema::dropIfExists('approvisionnements');
    }
};

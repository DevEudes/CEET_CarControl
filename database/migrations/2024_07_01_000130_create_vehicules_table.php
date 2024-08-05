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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation')->unique();
            $table->string('numero_moteur')->unique();
            $table->enum('type_moteur', ['essence', 'diesel', 'microhybride', 'hybride autorechargeable', 'hybride rechargeable', 'gaz naturel', 'gaz de petrole liquéfié', '100% électrique', 'pile à combustible']);
            $table->string('numero_chassis')->unique();
            $table->date('date_achat');
            $table->bigInteger('numero_carte_grise')->unique();
            $table->string('image_carte_grise')->unique();
            $table->date('validite_garantie')->nullable();
            $table->integer('kilometrage');
            $table->string('liste_outillage');
            $table->enum('etat_vehicule', ['neuf', 'bon etat', 'indisponible', 'en maintenance', 'etat passable', 'mauvais etat', 'rebut'])->default('neuf');
            $table->foreignId('id_genre_vehicule')->constrained(table: 'genre_vehicules');
            $table->foreignId('id_fournisseur')->constrained(table: 'fournisseurs');
            $table->foreignId('id_marque')->constrained(table: 'marques');
            $table->foreignId('id_modele')->constrained(table: 'modeles');
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
        Schema::dropIfExists('vehicules');
    }
};

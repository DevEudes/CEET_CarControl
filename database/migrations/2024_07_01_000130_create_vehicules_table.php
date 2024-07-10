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
            $table->string('code')->unique();
            $table->string('immatriculation')->unique();
            $table->string('marque');
            $table->string('modele');
            $table->string('numero_moteur')->unique();
            $table->string('numero_chassis')->unique();
            $table->date('date_obtention');
            $table->integer('numero_carte_grise')->unique();
            $table->string('image_carte_grise')->unique();
            $table->date('validite_garantie')->nullable();
            $table->integer('index');
            $table->string('liste_outillage');
            $table->enum('etat_vehicule', ['neuf', 'bon_etat', 'indisponible', 'en_maintenance', 'etat_passable', 'mauvais_etat', 'rebut'])->default('neuf');
            $table->foreignId('id_genre_vehicule')->constrained(table: 'genre_vehicules');
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

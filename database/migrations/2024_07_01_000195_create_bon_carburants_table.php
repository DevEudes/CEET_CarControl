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
        Schema::create('bon_carburants', function (Blueprint $table) {
            $table->id();
            $table->string('numero_bon_carburant')->unique();
            $table->string('point_approvisionnement');
            $table->enum('type_produit', ['essence', 'gasoil']);
            $table->double('quantite');
            $table->integer('montant');
            $table->foreignId('id_app_bon_sortie')->constrained(table:'app_bon_sorties');
            $table->foreignId('id_compagnie_petroliere')->constrained(table:'compagnie_petrolieres');
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
        Schema::dropIfExists('bon_carburants');
    }
};

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
        Schema::create('carte_carburants', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_carte')->unique();
            $table->integer('solde');
            $table->date('date_expiration');
            $table->foreignId('id_etablissement')->constrained(table: 'etablissements');
            $table->foreignId('id_vehicule')->constrained(table: 'vehicules');
            $table->timestamps();
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carte_carburants');
    }
};

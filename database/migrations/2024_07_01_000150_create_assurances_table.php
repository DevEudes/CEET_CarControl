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
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_police')->unique();
            $table->integer('montatnt');
            $table->date('date_debut');
            $table->date('date_expiration');
            $table->string('image');
            $table->enum('type_assurance', ['assurance_tout_risque', 'responsabilite_civile_cedeao_securite_routiere', 'responsabilite_civile_securite_routiere', 'en_maintenance']);
            $table->foreignId('id_compagnie_assurance')->constrained(table: 'compagnie_assurances');
            $table->foreignId('id_vehicule')->constrained(table: 'vehicules');
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
        Schema::dropIfExists('assurances');
    }
};

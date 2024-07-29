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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('date_demande')->unique();
            $table->string('nom_demandeur');
            $table->string('objet_demande');
            $table->integer('contact_demandeur');
            $table->foreignId('id_departement')->constrained(table: 'departements');
            $table->foreignId('id_type_sortie')->constrained(table: 'type_sorties');
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
        Schema::dropIfExists('demandes');
    }
};

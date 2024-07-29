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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->string('numero_affectation')->unique();
            $table->date('date_affectation');
            $table->integer('kilometrage');
            $table->string('fonction');
            $table->foreignId('id_departement')->constrained(table :'departements');
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
        Schema::dropIfExists('affectations');
    }
};

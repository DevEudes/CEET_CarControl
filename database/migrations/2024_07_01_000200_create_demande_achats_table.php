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
        Schema::create('demande_achats', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_demande')->unique();
            $table->date('date');
            $table->string('centre_cout_machine');
            $table->string('depense_engagement_concedent');
            $table->string('numero_ot');
            $table->string('motif');
            $table->foreignId('id_departement')->constrained(table :'departements');
            $table->foreignId('id_user')->constrained(table :'users');
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
        Schema::dropIfExists('demande_achats');
    }
};

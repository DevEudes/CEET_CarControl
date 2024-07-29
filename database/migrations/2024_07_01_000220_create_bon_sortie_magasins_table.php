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
        Schema::create('bon_sortie_magasins', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_bon_sortie')->unique();
            $table->date('date');
            $table->string('centre_cout_machine');
            $table->string('depense_engagement_concedent');
            $table->string('numero_ot')->unique();
            $table->enum('type_utilisation_materiel', ['exploitation', 'investissement', 'cession']);
            $table->foreignId('id_fiche_maintenance')->constrained(table :'fiche_maintenances');
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
        Schema::dropIfExists('bon_sortie_magasins');
    }
};

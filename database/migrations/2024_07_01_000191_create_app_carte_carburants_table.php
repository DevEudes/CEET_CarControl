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
        Schema::create('app_carte_carburants', function (Blueprint $table) {
            $table->id();
            $table->date('date_heure_depart');
            $table->date('date_heure_retour');
            $table->integer('kilometrage_depart');
            $table->integer('kilometrage_retour');
            $table->integer('solde_carte_depart');
            $table->integer('solde_carte_retour');
            $table->foreignId('id_approvisionnement')->constrained(table:'approvisionnements');
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
        Schema::dropIfExists('app_carte_carburants');
    }
};

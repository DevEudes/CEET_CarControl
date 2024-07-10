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
        Schema::create('sortie_pieces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_piece')->constrained(table: 'pieces');
            $table->foreignId('id_bon_sortie_magasin')->constrained(table: 'bon_sortie_magasins');
            $table->double('quantite');
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
        Schema::dropIfExists('sortie_pieces');
    }
};

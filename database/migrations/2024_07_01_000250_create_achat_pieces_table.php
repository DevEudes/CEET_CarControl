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
        Schema::create('achat_pieces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_piece')->constrained(table: 'pieces');
            $table->foreignId('id_demande_achat')->constrained(table: 'demande_achats');
            $table->double('quantite');
            $table->timestamps();
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achat_pieces');
    }
};

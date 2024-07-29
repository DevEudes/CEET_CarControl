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
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable(false);
            $table->string('nom');
            $table->double('quantite');
            $table->string('observation')->nullable(true);
            $table->foreignId('id_type_piece')->constrained(table :'type_pieces');
            $table->foreignId('id_fournisseur')->constrained(table :'fournisseurs');
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
        Schema::dropIfExists('pieces');
    }
};

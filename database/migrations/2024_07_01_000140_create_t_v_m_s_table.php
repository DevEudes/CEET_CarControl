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
        Schema::create('t_v_m_s', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_taxe')->unique();
            $table->integer('montatnt');
            $table->date('date_debut');
            $table->date('date_expiration');
            $table->string('image');
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
        Schema::dropIfExists('t_v_m_s');
    }
};

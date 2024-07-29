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
        Schema::create('app_bon_sorties', function (Blueprint $table) {
            $table->id();
            $table->string('numero_bon_sortie')->unique();
            $table->string('centre_cout_machine');
            $table->string('depense_engagement_concedent');
            $table->string('numero_ot')->unique();
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
        Schema::dropIfExists('app_bon_sorties');
    }
};

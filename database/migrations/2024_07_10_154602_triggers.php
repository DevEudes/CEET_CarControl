<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Trigger for Fiches de Sortie
        DB::unprepared('
            CREATE TRIGGER update_vehicle_state_on_fiche_sortie_insert
            AFTER INSERT ON fiche_sorties
            FOR EACH ROW
            BEGIN
                UPDATE vehicules 
                SET etat_vehicule = "indisponible"
                WHERE id = NEW.id_vehicule;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER update_vehicle_state_on_fiche_sortie_update
            AFTER UPDATE ON fiche_sorties
            FOR EACH ROW
            BEGIN
                IF NEW.etat_fiche = "termine" AND NOW() > NEW.date_heure_retour THEN
                    UPDATE vehicules 
                    SET etat_vehicule = "bon_etat"
                    WHERE id = NEW.id_vehicule;
                END IF;
            END
        ');

        // Trigger for Fiches de Maintenance
        DB::unprepared('
            CREATE TRIGGER update_vehicle_state_on_fiche_maintenance_insert
            AFTER INSERT ON fiche_maintenances
            FOR EACH ROW
            BEGIN
                UPDATE vehicules 
                SET etat_vehicule = "en_maintenance"
                WHERE id = NEW.id_vehicule;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER update_vehicle_state_on_fiche_maintenance_update
            AFTER UPDATE ON fiche_maintenances
            FOR EACH ROW
            BEGIN
                IF NEW.etat_fiche = "termine" AND NOW() > NEW.date_heure_sortie THEN
                    UPDATE vehicules 
                    SET etat_vehicule = "bon_etat"
                    WHERE id = NEW.id_vehicule;
                END IF;
            END
        ');

        // Trigger for Affectations
        DB::unprepared('
            CREATE TRIGGER update_vehicle_state_on_affectation_insert
            AFTER INSERT ON affectations
            FOR EACH ROW
            BEGIN
                UPDATE vehicules 
                SET etat_vehicule = "bon_etat"
                WHERE id = NEW.id_vehicule;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_vehicle_state_on_fiche_sortie_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS update_vehicle_state_on_fiche_sortie_update');
        DB::unprepared('DROP TRIGGER IF EXISTS update_vehicle_state_on_fiche_maintenance_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS update_vehicle_state_on_fiche_maintenance_update');
        DB::unprepared('DROP TRIGGER IF EXISTS update_vehicle_state_on_affectation_insert');
    }
};

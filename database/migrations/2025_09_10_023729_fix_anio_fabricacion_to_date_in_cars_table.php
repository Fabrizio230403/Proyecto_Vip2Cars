<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cambiamos tipo de columna a DATE (permitiendo NULL temporalmente)
        Schema::table('cars', function (Blueprint $table) {
            $table->date('anio_fabricacion')->nullable()->change();
        });

        // Actualizamos los valores existentes: años 'YYYY' → 'YYYY-01-01'
        DB::table('cars')->get()->each(function ($car) {
            $year = $car->anio_fabricacion;
            if ($year && preg_match('/^\d{4}$/', $year)) {
                DB::table('cars')->where('id', $car->id)
                    ->update(['anio_fabricacion' => "$year-01-01"]);
            }
        });

        // Hacemos la columna NOT NULL si deseas
        Schema::table('cars', function (Blueprint $table) {
            $table->date('anio_fabricacion')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        // Revertir a YEAR
        Schema::table('cars', function (Blueprint $table) {
            $table->year('anio_fabricacion')->change();
        });
    }
};
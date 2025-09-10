<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->date('anio_fabricacion');
            $table->foreignId('contact_id')->constrained()->onDelete('cascade'); // FK a contacts
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
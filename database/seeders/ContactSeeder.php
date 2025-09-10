<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            ['nombre' => 'Juan', 'apellidos' => 'Pérez', 'nro_documento' => '12345678', 'correo' => 'juan@example.com', 'telefono' => '987654321'],
            ['nombre' => 'María', 'apellidos' => 'Gómez', 'nro_documento' => '23456789', 'correo' => 'maria@example.com', 'telefono' => '987654322'],
            ['nombre' => 'Carlos', 'apellidos' => 'López', 'nro_documento' => '34567890', 'correo' => 'carlos@example.com', 'telefono' => '987654323'],
            ['nombre' => 'Ana', 'apellidos' => 'Martínez', 'nro_documento' => '45678901', 'correo' => 'ana@example.com', 'telefono' => '987654324'],
            ['nombre' => 'Luis', 'apellidos' => 'Rodríguez', 'nro_documento' => '56789012', 'correo' => 'luis@example.com', 'telefono' => '987654325'],
            ['nombre' => 'Sofía', 'apellidos' => 'Fernández', 'nro_documento' => '67890123', 'correo' => 'sofia@example.com', 'telefono' => '987654326'],
            ['nombre' => 'Miguel', 'apellidos' => 'García', 'nro_documento' => '78901234', 'correo' => 'miguel@example.com', 'telefono' => '987654327'],
            ['nombre' => 'Lucía', 'apellidos' => 'Torres', 'nro_documento' => '89012345', 'correo' => 'lucia@example.com', 'telefono' => '987654328'],
            ['nombre' => 'Diego', 'apellidos' => 'Ramírez', 'nro_documento' => '90123456', 'correo' => 'diego@example.com', 'telefono' => '987654329'],
            ['nombre' => 'Valeria', 'apellidos' => 'Vargas', 'nro_documento' => '01234567', 'correo' => 'valeria@example.com', 'telefono' => '987654330'],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}

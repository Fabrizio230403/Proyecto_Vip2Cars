VIP2CARS – Sistema de Gestión de Vehículos y Clientes
🛠 Descripción

Este proyecto implementa un CRUD de vehículos y clientes para el rubro automotriz VIP2CARS.
Permite registrar, editar, eliminar y visualizar vehículos y sus clientes asociados, incluyendo la posibilidad de subir una imagen del vehículo.

🔧 Requisitos del entorno

PHP >= 8.1

Composer

MySQL o PostgreSQL

Extensiones PHP: pdo, mbstring, fileinfo, openssl

Laravel 10.x

🧰 Instalación y puesta en marcha

Clonar el repositorio:

git clone https://github.com/TU_USUARIO/vip2cars.git
cd vip2cars


Instalar dependencias:

composer install


Configurar variables de entorno:

cp .env.example .env
php artisan key:generate


Configurar conexión a la base de datos en .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vip2cars
DB_USERNAME=root
DB_PASSWORD=


Ejecutar migraciones y seeders:

php artisan migrate --seed


Servir la aplicación:

php artisan serve

🗄 Estructura de la Base de Datos
Tabla contacts

id (PK)

nombre

apellidos

nro_documento

correo

telefono

Tabla cars

id (PK)

placa

marca

modelo

anio_fabricacion

contact_id (FK → contacts.id)

imagen (nullable)

Migraciones incluidas en el proyecto, también puedes ejecutar php artisan migrate:fresh para recrear la BBDD desde cero.

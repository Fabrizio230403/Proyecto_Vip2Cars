🔧🚗 VIP2CARS – Sistema de Gestión de Vehículos y Clientes

Descripción: Este proyecto implementa un CRUD de vehículos y clientes para el rubro automotriz VIP2CARS.
Permite registrar, editar, eliminar y visualizar vehículos y sus clientes asociados, incluyendo la posibilidad de subir una imagen del vehículo.

🔧 Requisitos del entorno

- PHP >= 8.1
- Composer
- MySQL o PostgreSQL
- Extensiones PHP: pdo, mbstring, fileinfo, openssl
- Laravel Framework 12.28.1

🧰 Instalación y puesta en marcha

1. Clonar el repositorio:

    git clone https://github.com/Fabrizio230403/Proyecto_Vip2Cars.git

    cd vip2cars-crud

2. Instalar dependencias PHP:

    composer install

3. Copiar el archivo de entorno:

    cp .env.example .env

4. Configurar .env con tus credenciales de base de datos:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=vip2cars
    DB_USERNAME=root
    DB_PASSWORD=

5. Generar clave de aplicación:

    php artisan key:generate


⚡ Instalación de Laravel Breeze (Autenticación)

1. Instalar Breeze:

  composer require laravel/breeze --dev

2. Instalar el scaffolding:

  php artisan breeze:install

3. Compilar assets:

  npm run dev


▶ Puesta en marcha

1. Crear la base de datos:

    CREATE DATABASE vip2cars CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

2. Ejecutar migraciones y seeders:

    php artisan migrate --seed

3. Levantar el servidor local:

    php artisan serve

4. Acceder al sistema desde el navegador:

    http://127.0.0.1:8000


🗄 Estructura de la Base de Datos

Tabla contacts (clientes)

- id	INT (PK)
- nombre	VARCHAR	
- apellidos	VARCHAR
- nro_documento   VARCHAR
- correo	VARCHAR
- telefono	VARCHAR
- created_at	TIMESTAMP
- updated_at	TIMESTAMP

Tabla cars (vehículos)

- id	INT (PK)
- placa	 VARCHAR
- marca	  VARCHAR
- modelo	VARCHAR
- anio_fabricacion  DATE
- contact_id	INT (FK)
- imagen	VARCHAR
- created_at	TIMESTAMP
- updated_at	TIMESTAMP


Relaciones: 

- cars.contact_id → contacts.id (N:1 - Muchos a uno)

Migraciones incluidas en el proyecto, también se puede ejecutar "php artisan migrate:fresh" para recrear la BBDD desde cero.

🔑 Usuario Demo

Correo: vipcars@gmail.com

Contraseña: Vip2Cars

Rol: Usuario administrador demo

Este usuario puede acceder a todas las funcionalidades del sistema


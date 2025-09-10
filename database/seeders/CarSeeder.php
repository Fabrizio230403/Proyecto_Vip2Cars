<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Contact;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['placa' => 'ABC123', 'marca' => 'Toyota', 'modelo' => 'Corolla', 'anio_fabricacion' => '2019-05-10', 'contact_id' => 1],
            ['placa' => 'DEF456', 'marca' => 'Honda', 'modelo' => 'Civic', 'anio_fabricacion' => '2020-03-15', 'contact_id' => 2],
            ['placa' => 'GHI789', 'marca' => 'Ford', 'modelo' => 'Focus', 'anio_fabricacion' => '2018-07-22', 'contact_id' => 3],
            ['placa' => 'JKL012', 'marca' => 'Chevrolet', 'modelo' => 'Cruze', 'anio_fabricacion' => '2021-01-05', 'contact_id' => 4],
            ['placa' => 'MNO345', 'marca' => 'Nissan', 'modelo' => 'Sentra', 'anio_fabricacion' => '2017-11-11', 'contact_id' => 5],
            ['placa' => 'PQR678', 'marca' => 'Kia', 'modelo' => 'Rio', 'anio_fabricacion' => '2020-09-09', 'contact_id' => 6],
            ['placa' => 'STU901', 'marca' => 'Hyundai', 'modelo' => 'Elantra', 'anio_fabricacion' => '2019-02-20', 'contact_id' => 7],
            ['placa' => 'VWX234', 'marca' => 'Mazda', 'modelo' => '3', 'anio_fabricacion' => '2021-06-30', 'contact_id' => 8],
            ['placa' => 'YZA567', 'marca' => 'Volkswagen', 'modelo' => 'Jetta', 'anio_fabricacion' => '2018-08-18', 'contact_id' => 9],
            ['placa' => 'BCD890', 'marca' => 'Suzuki', 'modelo' => 'Swift', 'anio_fabricacion' => '2017-12-12', 'contact_id' => 10],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}

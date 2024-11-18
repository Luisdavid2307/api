<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehiculo')->insert([
            [
                'nombre_del_vehiculo' => 'Toyota Corolla',
                'categoria' => 'Sedán',
                'descripcion' => 'Un vehículo confiable y económico.',
            ],
            [
                'nombre_del_vehiculo' => 'Ford F-150',
                'categoria' => 'Camioneta',
                'descripcion' => 'Perfecta para trabajos pesados.',
            ],
            [
                'nombre_del_vehiculo' => 'Tesla Model S',
                'categoria' => 'Eléctrico',
                'descripcion' => 'Vehículo eléctrico con tecnología avanzada.',
            ],
        ]);
    }
}

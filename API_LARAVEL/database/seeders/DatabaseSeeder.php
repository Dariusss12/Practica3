<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Framework;
use App\Models\Hobby;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        \App\Models\User::factory()->create([
            'name' => 'Darío',
            'lastname' => 'Contreras Abaca',
            'email' => 'dario.contreras@alumnos.ucn.cl',
            'city' => 'Antofagasta',
            'country' => 'Chile',
            'summary' => 'Estudiante de la carrera de Ing. Civil en Computación e Informática de la Universidad Católica del Norte.',
        ]);

        Framework::create([
            'name' => 'Laravel',
            'level' => 'Principiante',
            'year' => '2023',
        ]);

        Framework::create([
            'name' => 'Vue.js',
            'level' => 'Principiante',
            'year' => '2023',
        ]);

        Hobby::create([
            'name' => 'Videojuegos',
            'description' => 'Jugar varios videojuegos con amigos',
        ]);

        Hobby::create([
            'name' => 'Deportes',
            'description' => 'Realizar varios deportes como el Futbol, Voleibol, Ping-pong, entre otros.',
        ]);
    }
}

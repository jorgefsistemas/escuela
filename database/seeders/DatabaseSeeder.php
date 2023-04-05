<?php
namespace Database\Seeders;

use App\Models\Materia;
use App\Models\Estudiante;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);

         \App\Models\Estudiante::factory(15)->create();
         \App\Models\Materia::factory()->times(8)->create()->each( function($materia){
            $materia->estudiantes()->sync(
                //Cada curso es tomado por 3 estudiantes
                \App\Models\Estudiante::all()->random(3)
            );
    });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

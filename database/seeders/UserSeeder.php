<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registro = [
            ['admin', 'admin@mail.com', bcrypt('4dmin+22')],
            ['consultor', 'consultor@mail.com', bcrypt('+t3stS3cav1')],
            ['impresor', 'impresor@mail.com', bcrypt('+t3stS3imv1')],
            ['cancelador', 'cancelador@mail.com', bcrypt('+t3stS3mov1')]
        ];

        foreach ($registro as $value) {
            User::create([
                'nombre' => $value[0],
                'apellido1' => $value[0],
                'apellido2' => $value[0],
                'rfc' => $value[0],
                'curp' => $value[0],
                'email' => $value[1],
                'password' => $value[2]
            ]);
        }
        User::find(1)->assignRole(['impresor', 'consultor', 'cancelador','sistemas']);
        User::find(2)->assignRole(['consultor']);
        User::find(3)->assignRole(['impresor']);
        User::find(4)->assignRole(['cancelador']);
    }
}

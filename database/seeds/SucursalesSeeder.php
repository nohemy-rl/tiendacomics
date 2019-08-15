<?php

use Illuminate\Database\Seeder;
use App\Sucursal;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::insert([
          [
            'nombre' => 'Toluca'
          ],
          [
            'nombre' => 'Metepec'
          ]
        ]);
    }
}

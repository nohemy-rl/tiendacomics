<?php

use Illuminate\Database\Seeder;
use App\Inventario;

class InventariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventario::insert(
        [
          [
            'sucursal' => '1',
            'comic' =>  'Thanos',
            'cantidad'  =>  '100'
          ],
          [
            'sucursal' => '2',
            'comic' =>  'Thanos',
            'cantidad'  =>  '200'
          ],
      ]);
    }
}

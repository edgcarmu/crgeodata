<?php

namespace Edgcarmu\Crgeodata\database\seeds;

use Edgcarmu\Crgeodata\app\Models\Provincia;
use Illuminate\Database\Seeder;

class GeoDataCrProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::updateOrCreate(['provincia_id' => 1, 'tax_id' => 1, 'name' => 'San josé']);
        Provincia::updateOrCreate(['provincia_id' => 2, 'tax_id' => 2, 'name' => 'Alajuela']);
        Provincia::updateOrCreate(['provincia_id' => 3, 'tax_id' => 3, 'name' => 'Cartago']);
        Provincia::updateOrCreate(['provincia_id' => 4, 'tax_id' => 4, 'name' => 'Heredia']);
        Provincia::updateOrCreate(['provincia_id' => 5, 'tax_id' => 5, 'name' => 'Guanacaste']);
        Provincia::updateOrCreate(['provincia_id' => 6, 'tax_id' => 6, 'name' => 'Puntarenas']);
        Provincia::updateOrCreate(['provincia_id' => 7, 'tax_id' => 7, 'name' => 'Limón']);
    }
}

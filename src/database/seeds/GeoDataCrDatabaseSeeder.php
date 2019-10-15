<?php

namespace Edgcarmu\Crgeodata\database\seeds;

use Illuminate\Database\Seeder;

class GeoDataCrDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeoDataCrProvinciasTableSeeder::class);
        $this->call(GeoDataCrCantonesTableSeeder::class);
        $this->call(GeoDataCrDistritosTableSeeder::class);
        $this->call(GeoDataCrBarriosTableSeeder::class);
    }
}

<?php

namespace Edgcarmu\Crgeodata\app\Console\Commands;

use Edgcarmu\Crgeodata\app\Models\Barrio;
use Edgcarmu\Crgeodata\app\Models\Canton;
use Edgcarmu\Crgeodata\app\Models\Distrito;
use Edgcarmu\Crgeodata\app\Models\GeoDataCR;
use Edgcarmu\Crgeodata\app\Models\Provincia;
use Illuminate\Console\Command;

class Seed extends Command
{
    protected $progressBar;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'edgcarmu:crgeodata:seed
                                {--timeout=300} : How many seconds to allow each process to run.
                                {--debug} : Show process output or not. Useful for debugging.';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill CRGeoData Tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $provincias = GeoDataCR::provincias()->get();

        foreach ($provincias as $provincia) {

            Provincia::updateOrCreate([
                "provincia_id" => $provincia->provincia_id,
                "tax_id" => $provincia->provincia_id,
                "name" => $provincia->provincia_name
            ]);

            $cantones = GeoDataCR::cantones($provincia->provincia_id)->get();

            foreach ($cantones as $canton) {

                $sys_canton_id = sprintf("%02s", $canton->canton_id);
                $sys_canton_id = "{$provincia->provincia_id}{$sys_canton_id}";

                Canton::updateOrCreate([
                    "canton_id" => $sys_canton_id,
                    "provincia_id" => $provincia->provincia_id,
                    "tax_id" => $canton->canton_id,
                    "name" => $canton->canton_name,
                ]);

                $distritos = GeoDataCR::distritos($provincia->provincia_id, $canton->canton_id)->get();

                foreach ($distritos as $distrito) {

                    $sys_distrito_id = sprintf("%02s", $distrito->distrito_id);
                    $sys_distrito_id = "{$sys_canton_id}{$sys_distrito_id}";

                    Distrito::updateOrCreate([
                        "distrito_id" => $sys_distrito_id,
                        "canton_id" => $sys_canton_id,
                        "tax_id" => $distrito->distrito_id,
                        "name" => $distrito->distrito_name,
                    ]);

                    $barrios = GeoDataCR::barrios($provincia->provincia_id, $canton->canton_id, $distrito->distrito_id)->get();

                    foreach ($barrios as $barrio) {

                        $sys_barrio_id = sprintf("%02s", $barrio->barrio_id);
                        $sys_barrio_id = "{$sys_distrito_id}{$sys_barrio_id}";

                        Barrio::updateOrCreate([
                            "barrio_id" => $sys_barrio_id,
                            "distrito_id" => $sys_distrito_id,
                            "tax_id" => $barrio->barrio_id,
                            "name" => $barrio->barrio_name,
                        ]);

                    }// foreach $barrios
                }// foreach $distritos
            }// foreach $cantones
        }// foreach $provincias
    }
}

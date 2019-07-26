<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class GeoDataCR extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'provincia_id', 'provincia_name', 'canton_id', 'canton_name', 'distrito_id', 'distrito_name', 'barrio_id', 'barrio_name'];


    public function scopeProvincias($query)
    {
        return $query->select('provincia_id','provincia_name')
            ->groupBy('provincia_id','provincia_name');
    }

    public function scopeCantones($query, int $provincia_id)
    {
        return $query->distinct()
            ->select('canton_id', 'canton_name')
            ->where('provincia_id', $provincia_id)
            ->where('canton_id', '!=', 0);
    }

    public function scopeDistritos($query, int $provincia_id, int $canton_id)
    {
        return $query->distinct()
            ->select('distrito_id', 'distrito_name')
            ->where('provincia_id', $provincia_id)
            ->where('canton_id', $canton_id)
            ->where('distrito_id', '!=', 0);
    }

    public function scopeBarrios($query, int $provincia_id, int $canton_id, int $distrito_id)
    {
        return $query->distinct()
            ->select('barrio_id', 'barrio_name')
            ->where('provincia_id', $provincia_id)
            ->where('canton_id', $canton_id)
            ->where('distrito_id', $distrito_id)
            ->where('barrio_id', '!=', 0);
    }

}

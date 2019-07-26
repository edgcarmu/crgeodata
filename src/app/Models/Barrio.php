<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Backpack\CRUD\CrudTrait;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_barrios';
    protected $primaryKey = 'barrio_id';
    public $timestamps = false;
    protected $fillable = ["distrito_id", "barrio_id", "tax_id", "name"];

}

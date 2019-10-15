<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Barrio extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_barrios';
    protected $primaryKey = 'barrio_id';
    public $timestamps = false;
    protected $fillable = ['barrio_id', 'distrito_id', 'tax_id', 'name'];
}

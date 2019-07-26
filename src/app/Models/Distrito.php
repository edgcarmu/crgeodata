<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_distritos';
    protected $primaryKey = 'distrito_id';
    public $timestamps = false;
    protected $fillable = ["distrito_id", "canton_id", "tax_id", "name"];

}

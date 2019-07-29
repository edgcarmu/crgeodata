<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_provincias';
    public $timestamps = false;
    protected $primaryKey = 'provincia_id';
    protected $fillable = ['provincia_id', 'tax_id', 'name'];
}

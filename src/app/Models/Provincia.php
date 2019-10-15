<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Provincia extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_provincias';
    public $timestamps = false;
    protected $primaryKey = 'provincia_id';
    protected $fillable = ['provincia_id', 'tax_id', 'name'];
}

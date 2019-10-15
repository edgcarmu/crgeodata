<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Distrito extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_distritos';
    protected $primaryKey = 'distrito_id';
    public $timestamps = false;
    protected $fillable = ['distrito_id', 'canton_id', 'tax_id', 'name'];
}

<?php

namespace Edgcarmu\Crgeodata\app\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use CrudTrait;

    protected $table = 'geodatacr_cantones';
    protected $primaryKey = 'canton_id';
    public $timestamps = false;
    protected $fillable = ['canton_id', 'provincia_id', 'tax_id', 'name'];
}

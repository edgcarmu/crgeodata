# Backpack | CRGEODATA

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer config repositories.repo-name vcs https://github.com/edgcarmu/crgeodata
$ composer require edgcarmu/crgeodata
```

## Usage
Add to DatabaseSeeder.php

```
use Edgcarmu\Crgeodata\database\seeds\GeoDataCrDatabaseSeeder;

....

public function run()
{
    ...
    $this->call(GeoDataCrDatabaseSeeder::class);
    ...
}
```

Migration Model fields

```
$table->bigInteger('provincia_id')->unsigned()->nullable();
$table->bigInteger('canton_id')->unsigned()->nullable();
$table->bigInteger('distrito_id')->unsigned()->nullable();
$table->bigInteger('barrio_id')->unsigned()->nullable();

$table->foreign('provincia_id')->references('provincia_id')->on('geodatacr_provincias');
$table->foreign('canton_id')->references('canton_id')->on('geodatacr_cantones');
$table->foreign('distrito_id')->references('distrito_id')->on('geodatacr_distritos');
$table->foreign('barrio_id')->references('barrio_id')->on('geodatacr_barrios');        
```

Remember run the migrations

``` bash
$ php artisan migrate
```


Add to Model which will save address location data
```
use Edgcarmu\Crgeodata\app\Models\Barrio;
use Edgcarmu\Crgeodata\app\Models\Canton;
use Edgcarmu\Crgeodata\app\Models\Distrito;
use Edgcarmu\Crgeodata\app\Models\Provincia;

/*
 |--------------------------------------------------------------------------
 | RELATIONS
 |--------------------------------------------------------------------------
*/

function provincia()
{
    return $this->belongsTo(Provincia::class, 'provincia_id', 'provincia_id');
}

function canton()
{
    return $this->belongsTo(Canton::class, 'canton_id', 'canton_id');
}

function distrito()
{
    return $this->belongsTo(Distrito::class, 'distrito_id', 'distrito_id');
}

function barrio()
{
    return $this->belongsTo(Barrio::class, 'barrio_id', 'barrio_id');
}
```


BACKPACK CRUD

```
use Edgcarmu\Crgeodata\app\Models\Barrio;
use Edgcarmu\Crgeodata\app\Models\Canton;
use Edgcarmu\Crgeodata\app\Models\Distrito;
use Edgcarmu\Crgeodata\app\Models\Provincia;
```

COLUMNS
```
$this->crud->addColumn([
    'label' => trans('edgcarmu::crgeodata.provincia.field'),
    'type' => "select",
    'name' => "provincia_id",
    'entity' => 'provincia',
    'attribute' => "name",
    'model' => Provincia::class,
]);

$this->crud->addColumn([
    'label' => trans('edgcarmu::crgeodata.canton.field'),
    'type' => "select",
    'name' => "canton_id",
    'entity' => 'canton',
    'attribute' => "name",
    'model' => Canton::class,
]);

$this->crud->addColumn([
    'label' => trans('edgcarmu::crgeodata.distrito.field'),
    'type' => "select",
    'name' => "distrito_id",
    'entity' => 'distrito',
    'attribute' => "name",
    'model' => Distrito::class,
]);

$this->crud->addColumn([
    'label' => trans('edgcarmu::crgeodata.barrio.field'),
    'type' => "select",
    'name' => "barrio_id",
    'entity' => 'barrio',
    'attribute' => "name",
    'model' => Barrio::class,
]);
```
FIELDS
```
$this->crud->addField([
    'label' => trans('edgcarmu::crgeodata.provincia.field'),
    'type' => "select2_from_ajax",
    'name' => 'provincia_id', // the column that contains the ID of that connected entity
    'entity' => 'provincia', // the method that defines the relationship in your Model
    'attribute' => "name", // foreign key attribute that is shown to user
    'data_source' => url("api/internal/provincia"), // url to controller search function (with /{id} should return model)
    'placeholder' => trans('edgcarmu::crgeodata.provincia.placeholder'), // placeholder for the select
    'minimum_input_length' => 0, // minimum characters to type before querying results
]);

$this->crud->addField([
    'label' => trans('edgcarmu::crgeodata.canton.field'),
    'type' => "select2_from_ajax",
    'name' => 'canton_id', // the column that contains the ID of that connected entity
    'entity' => 'canton', // the method that defines the relationship in your Model
    'attribute' => "name", // foreign key attribute that is shown to user
    'data_source' => url("api/internal/canton"), // url to controller search function (with /{id} should return model)
    'placeholder' => trans('edgcarmu::crgeodata.canton.placeholder'), // placeholder for the select
    'minimum_input_length' => 0, // minimum characters to type before querying results
    'dependencies' => ['provincia_id'], // when a dependency changes, this select2 is reset to null
    'method' => 'GET', // optional - HTTP method to use for the AJAX call (GET, POST)
]);

$this->crud->addField([
    'label' => trans('edgcarmu::crgeodata.distrito.field'),
    'type' => "select2_from_ajax",
    'name' => 'distrito_id', // the column that contains the ID of that connected entity
    'entity' => 'distrito', // the method that defines the relationship in your Model
    'attribute' => "name", // foreign key attribute that is shown to user
    'data_source' => url("api/internal/distrito"), // url to controller search function (with /{id} should return model)
    'placeholder' => trans('edgcarmu::crgeodata.distrito.placeholder'), // placeholder for the select
    'minimum_input_length' => 0, // minimum characters to type before querying results
    'dependencies' => ['canton_id'], // when a dependency changes, this select2 is reset to null
    'method' => 'GET', // optional - HTTP method to use for the AJAX call (GET, POST)
]);

$this->crud->addField([
    'label' => trans('edgcarmu::crgeodata.barrio.field'),
    'type' => "select2_from_ajax",
    'name' => 'barrio_id', // the column that contains the ID of that connected entity
    'entity' => 'barrio', // the method that defines the relationship in your Model
    'attribute' => "name", // foreign key attribute that is shown to user
    'data_source' => url("api/internal/barrio"), // url to controller search function (with /{id} should return model)
    'placeholder' => trans('edgcarmu::crgeodata.barrio.placeholder'), // placeholder for the select
    'minimum_input_length' => 0, // minimum characters to type before querying results
    'dependencies' => ['distrito_id'], // when a dependency changes, this select2 is reset to null
    'method' => 'GET', // optional - HTTP method to use for the AJAX call (GET, POST)
]);
```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/edgcarmu/crgeodata.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/edgcarmu/crgeodata.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/edgcarmu/crgeodata/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/edgcarmu/crgeodata
[link-downloads]: https://packagist.org/packages/edgcarmu/crgeodata
[link-travis]: https://travis-ci.org/edgcarmu/crgeodata
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/edgcarmu
[link-contributors]: ../../contributors

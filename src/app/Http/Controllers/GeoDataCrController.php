<?php

namespace Edgcarmu\Crgeodata\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Edgcarmu\Crgeodata\app\Models\Barrio;
use Edgcarmu\Crgeodata\app\Models\Canton;
use Edgcarmu\Crgeodata\app\Models\Distrito;
use Edgcarmu\Crgeodata\app\Models\Provincia;
use Illuminate\Http\Request;

class GeoDataCrController extends Controller
{
    public function provincia_list(Request $request)
    {
        $search_term = $request->input('q');

        $options = Provincia::query();

        if ($search_term) {
            $results = $options->where('name', 'LIKE', '%' . $search_term . '%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }

    public function canton_list(Request $request)
    {
        $search_term = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = Canton::query();

        if (!$form['provincia_id']) {
            return [];
        }

        if ($form['provincia_id']) {
            $options = $options->where('provincia_id', $form['provincia_id']);
        }

        if ($search_term) {
            $results = $options->where('name', 'LIKE', '%' . $search_term . '%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }

    public function canton_show($id)
    {
        return Canton::find($id);
    }

    public function distrito_list(Request $request)
    {
        $search_term = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = Distrito::query();

        if (!$form['canton_id']) {
            return [];
        }

        if ($form['canton_id']) {
            $options = $options->where('canton_id', $form['canton_id']);
        }

        if ($search_term) {
            $results = $options->where('name', 'LIKE', '%' . $search_term . '%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }

    public function distrito_show($id)
    {
        return Distrito::find($id);
    }

    public function barrio_list(Request $request)
    {
        $search_term = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = Barrio::query();

        if (!$form['distrito_id']) {
            return [];
        }

        if ($form['distrito_id']) {
            $options = $options->where('distrito_id', $form['distrito_id']);
        }

        if ($search_term) {
            $results = $options->where('name', 'LIKE', '%' . $search_term . '%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }

    public function barrio_show($id)
    {
        return Barrio::find($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;


class RaceController extends DefaultController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $model_name = "Race";

    

    public function create(Request $request)
    {
        $race = new Race;

        $race->name = $request->name;
        
        $race->description = $request->description;

        $race->save();

        return response()->json($race);
    }

   

    public function update(Request $request, $id)
    {
        $product = Race::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return response()->json($product);
    }

}
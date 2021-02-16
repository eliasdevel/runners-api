<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;


class PersonController extends DefaultController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $model_name = "Person";



    public function create(Request $request)
    {
        $person = new Person;
        $person->name = $request->name;
        $person->birth_date = $request->birth_date;
        $person->cpf = $request->cpf;
        $person->description = $request->description;
        $person->save();

        return response()->json($person);
    }

    public function update(Request $request, $id)
    {
        $product = Person::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return response()->json($product);
    }
}

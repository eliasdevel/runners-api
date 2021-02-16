<?php

namespace App\Http\Controllers;

class DefaultController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $model_class;

    function __construct()
    {
        $this->model_class = "App\Models\\$this->model_name";
    }

    public function index()
    {
        $movies = $this->model_class::all();
        return response()->json($movies);
    }

    public function show($id)
    {
        $object = $this->model_class::find($id);

        return response()->json($object);
    }

    public function destroy($id)
    {
        $object = $this->model_class::find($id);
        $object->delete();

        return response()->json("$this->model_name::$id removed successfully");
    }
}

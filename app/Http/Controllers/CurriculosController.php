<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculosController extends Controller
{

	private $model;

    public function __construct(\App\Curriculo $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function index(Request $request)
    {
    	$rows = $this->model->with('areas')->paginate(20);
    	return view('curriculos', compact('rows'));
    }
}

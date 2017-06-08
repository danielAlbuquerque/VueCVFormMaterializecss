<?php

use Illuminate\Http\Request;

Route::post('/', function(Request $request) {
    Validator::make($request->all(), [
        'nome_completo' => 'required',
        'rg' => 'required',
        'cpf' => 'required',
        'dt_nascimento' => 'required',
        'email1' => 'required|email',
        'email2' => 'email',
        'cel1' => 'required',
        'nivel_escolaridade' => 'required',
        'arquivo' => ''
    ])->validate();
    return $request->all();
});

Route::get('/areas', function (Request $request) {
    $areas = App\Area::orderBy('descricao')->get();
    return $areas;
});

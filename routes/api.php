<?php

use Illuminate\Http\Request;

Route::post('/', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'nome_completo' => 'required',
        'rg' => 'required',
        'cpf' => 'required',
        'dt_nascimento' => 'required',
        'email1' => 'required|email',
        'cel1' => 'required',
        'nivel_escolaridade' => 'required',
        // 'arquivo' => 'mimes:doc,docx,pdf'
    ]);

    if ($validator->fails()) {
        \Log::info($validator->messages());
        return response()->json($validator->messages(), 400);
    }
     
    $data = $request->except('arquivo');
    $data['dt_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data['dt_nascimento']); 
    $cv = App\Curriculo::create($data);    
    $cv->areas()->attach($request->areas_interesse);

    if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
        $request->arquivo->store("curriculos/$cv->id/");
    }

    return $cv;
});

Route::get('/areas', function (Request $request) {
    $areas = App\Area::orderBy('descricao')->get();
    return $areas;
});

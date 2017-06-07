<?php



Route::get('/', function () {
    return view('index');
});


Route::post('/', function () {
    dd(Request::all());
});
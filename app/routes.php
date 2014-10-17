<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$response_array = parse_information('GET');
	return json_encode($response_array); 
});

Route::post('/', function()
{
	$response_array = parse_information('GET');
	return json_encode($response_array); 
});

Route::put('/', function()
{
	$response_array = parse_information('PUT');
	return json_encode($response_array); 
});

Route::delete('/', function()
{
	$response_array = parse_information('DELETE');
	return json_encode($response_array); 
});

Route::patch('/', function()
{
	$response_array = parse_information('PATCH');
	return json_encode($response_array); 
});


function parse_information( $method ){
	$response_array = array();
	$response_array['method'] = $method;
	$response_array['headeres'] = Request::header();
	$response_array['data'] = Input::all();
	return $response_array;
}
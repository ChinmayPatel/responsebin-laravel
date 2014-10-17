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
	return parse_information('GET');
});

Route::put('/', function()
{
	return parse_information('PUT');
});

Route::delete('/', function()
{
	return parse_information('DELETE');
});

Route::patch('/', function()
{
	return parse_information('PATCH');
});


function parse_information( $method ){
	$response_array = array();
	$response_array['method'] = $method;
	$response_array['headeres'] = Request::header();
	$response_array['url_params'] = $_GET;
	$response_array['post_params'] = $_POST;

	$response_array['data'] = Input::all();
	foreach ($response_array['url_params'] as $key => $value) {
		unset( $response_array['data'][$key]);
	}
	foreach ($response_array['post_params'] as $key => $value) {
		unset( $response_array['data'][$key]);
	}

	return Response::json($response_array);
}
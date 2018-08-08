<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
        'prefix' => 'auth'], function ($api) {
        $api->post('login', 'AuthController@login');
        $api->get('me', 'AuthController@me');
        $api->get('refresh', 'AuthController@refresh');
        $api->post('register', 'AuthController@register');
        $api->get('logout', 'AuthController@logout');
    });
    $api->group([
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
        'prefix' => 'coach'], function ($api) {
        $api->post('login', 'CoachController@login');
        $api->post('register', 'CoachController@register');
        $api->get('me', 'CoachController@me');
        $api->get('refresh', 'CoachController@refresh');
        $api->get('logout', 'CoachController@logout');
        $api->group(['prefix' => 'patient'], function ($api) {
            $api->get('{id}','CoachController@form');
        });

    });
    $api->group([
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'auth:api',
        'prefix' => 'patient'], function ($api) {
        $api->post('/', 'PatientController@store');
        $api->post('{id}', 'PatientController@update');
        $api->post('{id}/apply/{sid}', 'PatientController@apply');
        $api->get('{id}/absent/{sid}', 'PatientController@absent');
        $api->delete('{id}', 'PatientController@destroy');
    });

    $api->group([
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'auth:api',
        'prefix' => 'good'], function ($api) {
        $api->get('/', 'GoodController@index');
        $api->get('{id}', 'GoodController@show');

//        $api->post('{id}', 'PatientController@update');
//        $api->post('{id}/apply/{sid}', 'PatientController@apply');
//        $api->get('{id}/absent/{sid}', 'PatientController@absent');
//        $api->delete('{id}', 'PatientController@destroy');
    });

    $api->group([
        'namespace' => 'App\Http\Controllers',
        'prefix' => 'res'], function ($api) {
        $api->get('symptoms','ResourceController@symptoms');
        $api->get('record','ResourceController@exam');
        $api->get('inpatient/{id}','ResourceController@inpatient');
    });

    $api->group([
        'namespace' => 'App\Http\Controllers',
        'prefix' => 'supplier'], function ($api) {
        $api->post('login','SupplierController@login');
        $api->post('policyno','BznController@getPatient');
        $api->post('patient_price/sync','BznController@updatePrice');
        $api->post('patient_policy/sync','BznController@updatePolicy');
        $api->post('patient_policy/fail','BznController@failPolicy');
    });

});

Route::post('test/{id}',"BznController@commitInsured");
Route::post('test2',"BznController@getPatient");
Route::post('test3/{id}',"BznController@uploadHealthItem");

//Route::group([
//
//    'middleware' => 'api',
////    'namespace' => 'App\Http\Controllers',
//    'prefix' => 'jwt.auth',
//    'version' => 'v1'
//
//], function ($router) {
//
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
//
//});

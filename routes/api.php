<?php

use Illuminate\Http\Request;
use App\customerteamdata;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/customer_team_data', 'CustomerTeamController@customer_team_api');
Route::get('/customer_accounts_data', 'CustomerAccountsController@customer_accounts_api');
Route::get('/customer_services_data', 'CustomerServicesController@customer_services_api');
Route::get('/schedule', 'EventsController@schedule_api');




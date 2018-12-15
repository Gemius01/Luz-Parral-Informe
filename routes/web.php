<?php
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Exports\PruebasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//Usuarios
Route::middleware(['auth'])->group(function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reporte', 'ReporteController@index')->name('reporte');
Route::post('/reporte/search','ReporteController@generarReporte')->name('reporte.search');

Route::post('users/store','UserController@store')->name('users.store')
->middleware('permission:users.create');

Route::get('users','UserController@index')->name('users.index');

Route::get('users/create','UserController@create')->name('users.create')
->middleware('permission:users.create');

Route::put('users/{user}','UserController@update')->name('users.update')
->middleware('permission:users.edit');

Route::get('users/{user}','UserController@show')->name('users.show')
->middleware('permission:users.show');

Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
->middleware('permission:users.destroy');

Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
->middleware('permission:users.edit');


Route::get('users/{user}/editpassword','UserController@cambiarContraseñaVista')->name('users.editpassword');


Route::put('users/{user}/edit/password','UserController@cambiarContraseña')->name('users.editpasswordrequest');


//Datos

Route::get('datos','DatosController@index')->name('datos.index');

Route::put('datos/{dato}','DatosController@update')->name('datos.update')
->middleware('permission:users.edit');

Route::get('datos/{dato}/edit','DatosController@edit')->name('datos.edit')
->middleware('permission:users.edit');

Route::get('download', 'ReporteController@download')->name('download');

});
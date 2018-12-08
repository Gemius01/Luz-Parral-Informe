<?php
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/prueba', function () {
    $asd = DB::connection('mysql2')->select('select * from maclist');
    return response()->json($asd);
});

Route::get('/prueba2', function () {
    // $asd = DB::connection('mysql')->select('select `destino`,`mac` from `radiusdb`.`radacct`, `asd`.`maclist` WHERE (`mac`=`username`)');
    //dd(User::all());
    // return Excel::download(new UsersExport, 'users.xlsx');

    // return response()->json($asd);
    //dd(new UsersExport);
    // $headings = [
    //     'id', 
    //     'field1', 
        
    // ];
    // //return (new UsersExport($headings))->download('_inventory.xlsx');
    return Excel::download(new UsersExport, 'users.xlsx');

    
});
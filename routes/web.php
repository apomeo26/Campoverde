<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::resource('evento','EventoController');
Route::resource('mascota','mascotasController');
Route::resource('habitante', 'HabitantesController');
Route::resource('empleado',  'EmpleadoController');
Route::resource('visitante',  'VisitanteController');
Route::get('imprimirEventos','PDFController@imprimirEventos')->name('imprimirEventos');
Route::get('imprimirParqueadero', 'PDFController@imprimirParqueadero')->name('imprimirParqueadero');
Route::get('imprimirHabitantes','PDFController@imprimirHabitantes')->name('imprimirHabitantes');
Auth::routes();
Route::resource('multa','Detalle_facturaController');
Route::resource('Lista_vehiculo','Lista_VehiculoController');
Route::resource('parqueadero','ParqueaderoController');

Route::get('ingresar/{id}/{placa}','ParqueaderoController@ingresar')->name('ingresar');

Route::get('/home', 'HomeController@index')->name('home');

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

Route::resource('consejo','ConsejoController');
Route::resource('evento','EventoController');
Route::resource('mascota','mascotasController');
Route::resource('habitante', 'HabitantesController');
Route::resource('empleado',  'EmpleadoController');
Route::resource('visitante',  'VisitanteController');
Route::resource('multa','Detalle_facturaController');
Route::resource('Lista_vehiculo','Lista_VehiculoController');
Route::resource('parqueadero','ParqueaderoController');
Route::resource('factura', 'FacturaController');
Route::resource('pago', 'PagoController');
Route::resource('mercancia','MercanciaController');


Route::get('imprimirConsejo','PDFController@imprimirConsejo')->name('imprimirConsejo');
Route::get('imprimirEventos','PDFController@imprimirEventos')->name('imprimirEventos');
Route::get('imprimirParqueadero', 'PDFController@imprimirParqueadero')->name('imprimirParqueadero');
Route::get('imprimirHabitantes','PDFController@imprimirHabitantes')->name('imprimirHabitantes');
Route::get('imprimirFacturas/{id}','PDFController@imprimirFacturas')->name('imprimirFacturas');
Auth::routes();




Route::get('pagar/{id}/{habitantes_id}','FacturaController@pagar')->name('pagar');
Route::get('ingresar/{id}/{placa}','ParqueaderoController@ingresar')->name('ingresar');

Route::get('/home', 'HomeController@index')->name('home');

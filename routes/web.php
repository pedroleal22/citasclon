<?php

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


//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes', 'PacienteController');

Route::get('/citasPasadas','CitaController@citasPasadas')->name('citas.citasPasadas');
Route::get('/create','TratamientoController@addTratamiento')->name('s.citasPasadas');

//Route::get('citas/addTratamiento/{id}', 'CitaController@addTratamiento')->name('citas.addTratamiento'); //
Route::get('tratamientos/addMedicacion/{id}', 'MedicacionController@addMedicacion')->name('tratamiento.addMedicacion'); //
Route::get('medicacion/findByTratamiento/{id}', 'MedicacionController@findByTratamiento')->name('medicacion.findByTratamiento'); //
Route::get('medicacion/createByTratamiento/{id}', 'MedicacionController@createByTratamiento')->name('medicacion.createByTratamiento'); //

Route::post('medicacion/storeToTratamiento', 'MedicacionController@storeToTratamiento')->name('medicacion.storeToTratamiento');



Route::resource('citas', 'CitaController');

//Route::delete('enfermedads/destroyAll', 'EnfermedadController@destroyAll')->name('enfermedads.destroyAll');

Route::resource('enfermedads', 'EnfermedadController');
Route::resource('medicacions', 'MedicacionController');
Route::resource('consultas', 'ConsultaController');

Route::resource('medicacion', 'MedicacionController');

Route::resource('locations', 'LocationController');


Route::resource('medicinas','MedicinaController');
Route::resource('tratamientos','TratamientoController');
Auth::routes();

Route::get('/home', 'HomeController@index');


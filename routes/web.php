<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\tablaController;



// protected $table = 'formulario';

// {{var_dump($variable)}}
// $usuarios = M_index::all();


//Route::get('/hola/{url}', homeController::class);
// Route::get('/inicio/{url}', [indexController::class,'index']);
 //Route::get('/guardar', [indexController::class, 'guardar']);
 //Route::get('/leer', [indexController::class, 'leer']);
// Route::get('/leerActividadespdf',[indexController::class,'leerActividadespdf']);
Route::get('/', [indexController::class, 'fc_index'])->name('inicio');
Route::get('/perfil', [perfilController::class, 'fc_perfil'])->name('perfil');
Route::get('/tabla',[tablaController::class, 'fc_tabla'])->name('tabla');


//Route::get('/leerActividades',[activitiesController::class, 'leerActividades']);
//Route::get('/editar', [activitiesController::class, 'editar']);
//Route::post('/guardarimagen', [activitiesController::class, 'guardarimagen']);
//Route::post('/guardarimagenactualizar', [activitiesController::class, 'guardarimagenactualizar']);
//Route::post('/verificaimagen', [activitiesController::class, 'verificaimagen']);
//Route::get('/eliminar',[activitiesController::class, 'eliminar']);  
//Route::get('/{parametro}', [activitiesController::class, 'activities']);

// Route::get('curso/{variableURL}', function($variableURL){
//     return "welcome $variableURL";
// });

//Route::get('/',[C_index::class, 'plnatilla']);
//use App\Http\Controllers\C_index;
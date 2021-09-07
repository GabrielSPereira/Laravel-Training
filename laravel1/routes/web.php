<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;

Route::get('/', HomeController::class);
Route::view('/teste', 'teste');

Route::get('/login', function() {
	echo 'Página login';
})->name('login');

Route::resource('todo', 'TodoController');

Route::prefix('/tarefas')->group(function(){
	Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list');

	Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add');
	Route::post('add', [TarefasController::class, 'addAction']);

	Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit');
	Route::post('edit/{id}', [TarefasController::class, 'editAction']);

	Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del');

	Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done');
});

Route::prefix('/config')->group(function() {
	Route::get('/', [ConfigController::class, 'index'])->middleware('auth');
	Route::post('/', [ConfigController::class, 'index']);
	Route::get('info', [ConfigController::class, 'info']);
	Route::get('permissoes', [ConfigController::class, 'permissoes']);
});

Route::fallback(function() {
	return view('404');
});
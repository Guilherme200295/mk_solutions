<?php

use App\Http\Controllers\AtendentesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SituacaoAgendamentoController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;






Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Adicionar o midleware auth às demais rotas no web.php
Route::group(['middleware' => ['auth']], function () {

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/usuarios', [UsuariosController::class, 'lista']);
Route::get('/clientes', [ClientesController::class, 'lista']);
Route::get('/produtos', [ProdutoController::class, 'lista']);
Route::get('/usuarios-add', [UsuariosController::class, 'add']);
Route::get('/produtos-add', [ProdutoController::class, 'add']);
Route::get('/situacaoAgendamento-add', [SituacaoAgendamentoController::class, 'add']);



Route::get('/atendentes', [AtendentesController::class, 'lista']);
Route::get('/atendentes-add', [AtendentesController::class, 'add']);
Route::get('/atendentes-edit/{id}', [AtendentesController::class, 'edit']);
Route::post('/atendentes-save/{id?}', [AtendentesController::class, 'save']);
Route::get('/atendentes-delete/{id}', [AtendentesController::class, 'delete']);

Route::get('/clientes', [ClientesController::class, 'lista']);
Route::get('/clientes-add', [ClientesController::class, 'add']);
Route::get('/clientes-edit/{id}', [ClientesController::class, 'edit']);
Route::post('/clientes-save/{id?}', [ClientesController::class, 'save']);
Route::get('/clientes-delete/{id}', [ClientesController::class, 'delete']);

Route::get('/tecnico', [TecnicoController::class, 'lista']);
Route::get('/tecnico-add', [TecnicoController::class, 'add']);
Route::get('/tecnico-edit/{id}', [TecnicoController::class, 'edit']);
Route::post('/tecnico-save/{id?}', [TecnicoController::class, 'save']);
Route::get('/tecnico-delete/{id}', [TecnicoController::class, 'delete']);

Route::get('/situacaoAgendamento', [SituacaoAgendamentoController::class, 'lista']);
Route::get('/situacaoAgendamento-add', [SituacaoAgendamentoController::class, 'add']);
Route::get('/situacaoAgendamento-edit/{id}', [SituacaoAgendamentoController::class, 'edit']);
Route::post('/situacaoAgendamento-save/{id?}', [SituacaoAgendamentoController::class, 'save']);
Route::get('/situacaoAgendamento-delete/{id}', [SituacaoAgendamentoController::class, 'delete']);






});

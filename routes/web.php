<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\Admin\AdminMiddleware;

Route::get('/', [LoginController::class, "getLogin"])->name('login');
Route::post('/', [LoginController::class, "login"]);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, "logout"])->name('logout');
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', [AdminController::class, "getDashboard"])->name('dashboard');
        Route::get('/add-evento', [AdminController::class, "getAddEvento"])->name('add-evento');
        Route::post('/add-evento', [AdminController::class, "postAddEvento"]);
        Route::prefix('/evento/{evento_id}')->group(function () {
            Route::get('/', [AdminController::class, "evento"])->name('evento');
            Route::get('/add-certificado-base', [AdminController::class, "getAddCertificadoBase"])->name('add-certificado-base');
            Route::post('/add-certificado-base', [AdminController::class, "postAddCertificadoBase"]);
            Route::get('/add-organizador', [AdminController::class, "getAddOrganizador"])->name('add-organizador');
            Route::post('/add-organizador', [AdminController::class, "postAddOrganizador"]);
            Route::get('/exportar-organizadores', [AdminController::class, "exportarOrganizadores"])->name('exportar-organizadores');
            Route::get('/add-ponente', [AdminController::class, "getAddPonente"])->name('add-ponente');
            Route::post('/add-ponente', [AdminController::class, "postAddPonente"]);
            Route::get('/add-asistente', [AdminController::class, 'getAddAsistente'])->name('get-add-asistente');
            Route::post('/add-asistente', [AdminController::class, 'postAddAsistente'])->name('post-add-asistente');
            Route::get('/add-preregistrado', [AdminController::class, 'getAddPreregistrado'])->name('get-add-preregistrado');
            Route::post('/add-preregistrado', [AdminController::class, 'postAddPreregistrado'])->name('post-add-preregistrado');
            Route::get('/certificados', [AdminController::class, "certificados"])->name('admin-certificados');
            Route::get('/certificados/organizadores', [AdminController::class, "generarCertificadoOrganizadores"])->name('generar_organizadores');
            Route::get('/certificados/ponentes', [AdminController::class, "generarCertificadoPonentes"])->name('generar_ponentes');
            Route::get('/certificados/asistentes', [AdminController::class, 'generarCertificadoAsistentes'])->name('generar_asistentes');
            Route::get('/certificados/preregistrados', [AdminController::class, 'generarCertificadoPreregistrados'])->name('generar_preregistrados');
            Route::get('/eliminar-participante/{user_id}/{tipo_id}', [AdminController::class, "eliminarParticipante"])->name('eliminar-participante');
            Route::post('/actualizar-ponencia/{user_id}', [AdminController::class, "actualizarPonencia"])->name('actualizar-ponencia');
        });
    });
});
Route::get('/certificado/{certificado_id}', [AdminController::class, "documento"])->name('documento');
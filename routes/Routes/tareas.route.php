<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Tareas\TareasController;

Route::prefix('tareas')->group(function () {
    Route::get('/', [TareasController::class, 'index'])->name('tareas:index');
    Route::get('/{tarea}', [TareasController::class, 'show'])->name('tareas:show');
    Route::post('/', [TareasController::class, 'store'])->name('tareas:store');
    Route::post('/edit/{tarea}', [TareasController::class, 'update'])->name('tareas:update');
    Route::delete('/{tarea}', [TareasController::class, 'destroy'])->name('tareas:delete');
    Route::post('/ordenar', [TareasController::class, 'ordenamiento'])->name('tareas:ordenamiento');
    Route::put('/cambio/{tarea}', [TareasController::class, 'cambiarEstado'])->name('tareas:cambio');
});

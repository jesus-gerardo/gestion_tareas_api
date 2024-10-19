<?php

namespace App\Services\Tareas;
use App\Models\Tarea;
use Illuminate\Support\Collection;

trait TareaService
{
    public function findAll(): Collection
    {
        return Tarea::orderBy('order', 'asc')->get();
    }

    public function findOne(int $id): Tarea
    {
        $tareas = Tarea::find($id);
        if (!$tareas) {

        }
        return $tareas;
    }

    public function create($request):Tarea
    {
        return Tarea::create($request);
    }

    public function edit(Tarea $tarea, $data)
    {
        $tarea->titulo = $data->titulo;
        $tarea->descripcion = $data->descripcion;
        $tarea->estado = $data->estado;
        $tarea->fecha_creacion = $data->fecha_creacion;
        $tarea->fecha_finalizacion = $data->fecha_finalizacion;
        $tarea->save();
        return $tarea;
    }

    public function delete()
    {

    }

    public function getNumberRows(): int
    {
        return Tarea::count();
    }
}
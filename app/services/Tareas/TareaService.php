<?php

namespace App\Services\Tareas;
use App\Models\Tarea;
use Illuminate\Support\Collection;

trait TareaService
{
    public function findAll(): Collection
    {
        return Tarea::all();
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

    public function update()
    {

    }

    public function delete()
    {

    }

    public function getNumberRows(): int
    {
        return Tarea::count();
    }
}
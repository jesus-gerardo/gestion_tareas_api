<?php

namespace App\Http\Controllers\Api\Tareas;

use App\Http\Controllers\Controller;
use App\Http\Requests\TareaCreate;
use App\Http\Requests\TareaUpdate;
use App\Models\Tarea;
use App\Services\Tareas\TareaService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TareasController extends Controller
{
    use TareaService;

    public function index(): Collection
    {
        return $this->findAll();
    }

    public function show(Tarea $tarea): Tarea
    {
        return $tarea;
    }

    public function store(TareaCreate $request): JsonResponse
    {
        try {
            $data = $request->validated();

            if ($request->has('picture')) {
                $picture = $request->file('picture');
                $path = $picture->store('pictures', 'public'); // lo guardamos en el public
                // guardamos la ruta donde se guardo
                $data['picture'] = $path;
            }

            $data['order'] = $this->getNumberRows() + 1;
            $tarea = $this->create($data);
            return new JsonResponse([
                'success' => true,
                'data' => $tarea,
                'msg' => 'Tarea creada con éxito'
            ], 201);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'data' => null,
                'msg' => 'Error al crear la tarea',
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function update(Tarea $tarea, TareaUpdate $request): JsonResponse
    {
        try {
            $data = $request->validated();
            if ($request->has('picture')) {
                $picture = $request->file('picture');
                $path = $picture->store('pictures', 'public'); // lo guardamos en el public
        
                // verificamos que exista algo en la column
                if ($tarea->picture) {
                    // eliminamos la imagen anterior
                    Storage::disk('public')->delete($tarea->picture);
                }
                // guardamos la ruta donde se guardo
                $tarea->picture = $path;
            }

            $edit = $this->edit($tarea, (object) $data);
            return new JsonResponse([
                'success' => true,
                'data' => $edit,
                'msg' => 'Tarea Editada con éxito'
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'data' => null,
                'error' => $e->getMessage(),
                'msg' => 'Error al editar la tarea'
            ], 200);
        }
    }
    public function destroy(Tarea $tarea): JsonResponse
    {
        try {
            $tarea->delete();
            return new JsonResponse([
                'success' => true,
                'error' => null
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function cambiarEstado(Tarea $tarea, Request $request)
    {
        try {
            $tarea->estado = $request->input('estado', 'pendiente');
            $tarea->save();
            return new JsonResponse([
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage(),
            ], 200);
        }
    }

    public function ordenamiento(Request $request)
    {
        try {
            $lista = $request->input('list', []);
            foreach ($lista as $list) {
                Tarea::find($list['id'])->update(['order' => $list['order'] + 1]);
            }
            return new JsonResponse([
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], 200);
        }
    }
}

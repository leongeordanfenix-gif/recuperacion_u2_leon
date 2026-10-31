<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use App\Http\Resources\AutorResource;

class AutorController extends Controller
{
    public function index()
    {
        return AutorResource::collection(Autor::all());
    }

    public function store(AutorRequest $request)
    {
        $autor = Autor::create($request->validated());
        return new AutorResource($autor);
    }

    public function show(string $id)
    {
        $autor = Autor::findOrFail($id);
        return new AutorResource($autor);
    }

    public function update(AutorRequest $request, string $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->validated());
        return new AutorResource($autor);
    }

    public function destroy(string $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(['message' => 'Autor eliminado correctamente'], 200);
    }

    // Endpoint especifico del examen con eager loading (with())
    public function libros(string $id)
    {
        $autor = Autor::with('libros')->findOrFail($id);
        return new AutorResource($autor);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use App\Http\Requests\LibroRequest;
use App\Http\Resources\LibroResource;

class LibroController extends Controller
{
    public function index()
    {
        return LibroResource::collection(Libro::with('autor')->get());
    }

    public function store(LibroRequest $request)
    {
        $libro = Libro::create($request->validated());
        return new LibroResource($libro->load('autor'));
    }

    public function show(string $id)
    {
        $libro = Libro::findOrFail($id);
        return new LibroResource($libro->load('autor'));
    }

    public function update(LibroRequest $request, string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->validated());
        return new LibroResource($libro->load('autor'));
    }

    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json(['message' => 'Libro eliminado correctamente'], 200);
    }
}

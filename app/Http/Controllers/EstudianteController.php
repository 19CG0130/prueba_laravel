<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Grupo;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $estudiantes = Estudiante::with('grupo')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('estudiantes.create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:100',
            'apellidos' => 'required|regex:/^[A-Za-z\s]+$/|max:100',
            'edad' => 'required|integer|min:1',
            'email' => 'required|email|unique:estudiante,email',
            'telefono' => 'required|regex:/^[0-9]+$/|max:10',
            'grupo_id' => 'required|exists:grupos,id',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $estudiante = Estudiante::with('grupo')->findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $grupos = Grupo::all();
        return view('estudiantes.edit', compact('estudiante', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|regex:/^[A-Za-z\s]+$/|max:100',
            'apellidos' => 'required|regex:/^[A-Za-z\s]+$/|max:100',
            'edad' => 'required|integer|min:1',
            'email' => 'required|email|unique:estudiante,email,' . $id,
            'telefono' => 'required|regex:/^[0-9]+$/|max:10',
            'grupo_id' => 'required|exists:grupos,id',
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}

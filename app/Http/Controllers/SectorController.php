<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::orderBy('name')->get();

        return view('sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Sector::create($validated);

        return redirect()
            ->route('setores.index')
            ->with('success', 'Setor cadastrado com sucesso.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $setore)
    {
        return view('sectors.edit', [
            'sector' => $setore,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $setore)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $setore->update($validated);

        return redirect()
            ->route('setores.index')
            ->with('success', 'Setor atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $setore)
    {
        $setore->delete();

        return redirect()
            ->route('setores.index')
            ->with('success', 'Setor excluído com sucesso.');
    }
}

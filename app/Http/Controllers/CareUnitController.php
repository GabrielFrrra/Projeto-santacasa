<?php

namespace App\Http\Controllers;

use App\Models\CareUnit;
use Illuminate\Http\Request;

class CareUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careUnits = CareUnit::orderBy('name')->get();

        return view('care-units.index', compact('careUnits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('care-units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        CareUnit::create($validated);

        return redirect()
            ->route('unidades.index')
            ->with('success', 'Unidade Assistencial cadastrada com sucesso.');
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
    public function edit(CareUnit $careUnit)
    {
        return view('care-units.edit', [
            'careUnit' => $careUnit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareUnit $careUnit)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $careUnit->update($validated);

        return redirect()
            ->route('unidades.index')
            ->with('success', 'Unidade Assistencial atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareUnit $careUnit)
    {
        $careUnit->delete();

        return redirect()
            ->route('unidades.index')
            ->with('success', 'Unidade Assistencial excluída com sucesso.');
    }
}


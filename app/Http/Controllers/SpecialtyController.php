<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::orderBy('name')->get();

        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Specialty::create($validated);

        return redirect()
            ->route('especialidades.index')
            ->with('success', 'Especialidade cadastrada com sucesso.');
    }

    public function edit(Specialty $especialidade)
    {
        return view('specialties.edit', [
            'specialty' => $especialidade,
        ]);
    }

    public function update(Request $request, Specialty $especialidade)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $especialidade->update($validated);

        return redirect()
            ->route('especialidades.index')
            ->with('success', 'Especialidade atualizada com sucesso.');
    }

    public function destroy(Specialty $especialidade)
    {
        $especialidade->delete();

        return redirect()
            ->route('especialidades.index')
            ->with('success', 'Especialidade excluída com sucesso.');
    }
}
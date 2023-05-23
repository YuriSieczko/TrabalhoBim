<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Prof;
use App\Models\Vinculo;
use Illuminate\Http\Request;

class VinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vinculo::all();
        $professores = Prof::all();
        $disciplinas = Disciplina::all();

        return view('vinculos.index', (['data' => $data, 'professores' => $professores, 'disciplinas' => $disciplinas]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $docencia = $request->professores;

        if (isset($docencia)) {
            foreach ($docencia as $item) {
                $dados = explode("_", $item);
                $disciplina = Disciplina::find($dados[0]);
                if (isset($dados[1])) {
                    $professor = Prof::find($dados[1]);
                    Vinculo::firstOrCreate([
                        'profs_id' => $professor->id,
                        'disciplinas_id' => $disciplina->id
                    ], [
                            'profs_id' => $professor->id,
                            'disciplinas_id' => $disciplina->id
                        ]);

                }

            }
        }
        return redirect()->route('vinculos.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
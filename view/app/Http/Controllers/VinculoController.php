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
        // aqui só existe uma troca de nome de variavel 
        // la no datablade-vinculo ele ta assim name="professores[]" 
        // dai ele só converte pra $docencia

        if (isset($docencia)) {
            // verrifica se doscencia existe
            foreach ($docencia as $item) {
                // pega docencia que é uma string
                $dados = explode("_", $item);
                // tranforma doscencia em um arrei com dois valores id professor e id disciplina
                // isso vem la do datatable-vinculo
                $disciplina = Disciplina::find($dados[0]);
                // neste caso aqui como disciplina sempre existe ele só pega e  procura o dado
                if (isset($dados[1])) {
                    // caso exista verifica se professor existe
                    $professor = Prof::find($dados[1]);
                    // caso ele exista ele procura e coloca dentro de $professor
                    Vinculo::firstOrCreate([
                        // ele recebe os dados de vinculo caso exista ele substitu 
                        'profs_id' => $professor->id,
                        // a varaivel aqui ta pegando o valor de $professor e acessando o id pra mandar pro banco de dados
                        'disciplinas_id' => $disciplina->id
                    ], [
                        // caso ele não exista ele cria
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
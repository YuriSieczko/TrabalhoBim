<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {

        $data = Disciplina::all();
        $cursos = Curso::all();
        return view('disciplinas.index', (['disciplinas' => $data, 'cursos' => $cursos]));
    }

    public function create(Request $request)
    {
        $dados = Curso::all();
        return view('disciplinas.create',(['cursos'=>$dados]));
    }

    public function store(Request $request)
    {
        Disciplina::create([
            "nome" => $request->nome,
            "carga" => $request->carga,
            "curso" => $request->curso,
        ]);

        return redirect()->route('disciplinas.index');
    }


    public function show($id)
    {
        $dados = Disciplina::find($id);
        return view('disciplinas.show', compact('data'));
    }


    public function edit($id)
    {
        $cursos = Curso::all();
        $dados = Disciplina::find($id);
        return view('disciplinas.edit', compact(['dados','cursos']));

    }


    public function update(Request $request, $id)
    {
        $reg = Disciplina::find($id);
        $reg->fill([
            "nome" => $request->nome,
            "carga" => $request->carga,
            "curso" => $request->curso,
        ]);
        $reg->save();

        return redirect()->route('disciplinas.index');
    }

    public function destroy($id)
    {
        Disciplina::destroy($id);
        return redirect()->route('disciplinas.index');
    }
}
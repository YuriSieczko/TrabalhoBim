<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller {
    
    public function index()
    {
        $dados = Curso::all();

        return view('cursos.index', (['cursos' => $dados]));
    }

    public function create(Request $request)
    {
        $dados = Eixo::all();
        return view('cursos.create',(['eixos' => $dados]));
    }

    public function store(Request $request)
    {
        Curso::create([
            "nome" => $request->nome,
            "sigla" => $request->sigla,
            "ano" => $request->ano,
            "eixo" => $request->eixo,
        ]);

        return redirect()->route('cursos.index');
    }


    public function show($id)
    {
        $dados = Curso::find($id);
        return view('cursos.show', compact('dados'));

    }


    public function edit($id)
    {
        $eixos = Eixo::all();
        $dados = Curso::find($id);
        
       
        return view('cursos.edit', compact(['dados','eixos']));


    }


    public function update(Request $request, $id)
    {
        $reg = Curso::find($id);
        $reg->fill([
            "nome" => $request->nome,
            "sigla" => $request->sigla,
            "ano" => $request->ano,
            "eixo" => $request->eixo,
        ]);
        $reg->save();

        return redirect()->route('cursos.index');
    }

    public function destroy($id)
    {
        Curso::destroy($id);
        return redirect()->route('cursos.index');
    }
}

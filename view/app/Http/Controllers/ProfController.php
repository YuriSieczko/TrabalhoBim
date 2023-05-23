<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Prof;
use Illuminate\Http\Request;

class ProfController extends Controller {
    
   
    public function index()
    {
        $eixos = Eixo::all();
        $professor = Prof::all();

        return view('profs.index', (['profs' => $professor,'eixos' => $eixos]));
    }

    public function create(Request $request)
    {
        $dados = Eixo::all();
        return view('profs.create', (['eixos' => $dados])); 
    }

    public function store(Request $request)
    {
        Prof::create([
            
            "ativo" => $request->ativo,
            "nome" => $request->nome,
            "email" => $request->email,
            "siape" => $request->siape,
            "eixo" => $request->eixo,
        ]);

        return redirect()->route('profs.index');
    }


    public function show($id)
    {
        $dados = Prof::find($id);
        return view('profs.show', compact('professor'));
    }


    public function edit($id)
    {
        $eixos = Eixo::all();
        $dados = Prof::find($id);
        return view('profs.edit', compact(['dados','eixos']));

    }


    public function update(Request $request, $id)
    {
        $reg = Prof::find($id);
        $reg->fill([
            "nome" => $request->nome,
            "email" => $request->email,
            "siape" => $request->siape,
            "ativo" => $request->ativo,
            "eixo" => $request->eixo,
        ]);
        $reg->save();

        return redirect()->route('profs.index');
    }

    public function destroy($id)
    {
        Prof::destroy($id);
        return redirect()->route('profs.index');
    }
}

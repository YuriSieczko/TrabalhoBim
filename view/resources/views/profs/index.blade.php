<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Professores", 'rota' => "profs.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Professores" 
                crud="profs"
                :header="['id', 'nome', 'eixo' , 'ativo']" 
                :data="$profs"
                :eixos="$eixos"
                :acoes="[true, true, true]"
            /> 
        </div>
    </div>
@endsection
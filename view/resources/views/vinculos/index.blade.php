<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Vinculos"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Vinculos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable-vinculo 
                title="Vinculos" 
                crud="vinculos"
                :header="['disciplinas', 'professores']" 
                :data="$data"
                :disciplinas="$disciplinas"
                :professores="$professores"
            /> 
        </div>
    </div>
@endsection
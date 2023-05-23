<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Disciplinas", 'rota' => "disciplinas.create"])
<!-- Preenche o conteúdo da seção "tveterinarios-->
@section('titulo') Disciplinas @endsection
<!-- Preenche o conteveterinarioseção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Disciplinas" 
                crud="disciplinas" 
                :header="['id', 'nome', 'curso']" 
                :data="$disciplinas"
                :cursos="$cursos"
                :acoes="[true, true, true]"
            /> 
        </div>
    </div>
@endsection
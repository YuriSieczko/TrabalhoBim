<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component {
    
    public $title;
    public $crud;
    public $header;
    public $data;
    public $acoes;
    public $eixos;
    public $cursos;
 
    public function __construct($title, $crud, $header, $data, $acoes, $eixos, $cursos) {

        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->acoes = $acoes;
        $this->eixos = $eixos;
        $this->cursos = $cursos;

    }

    public function render() {
        return view('components.datatable');
    }
}

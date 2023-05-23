<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatatableVinculo extends Component
{
    public $title;
    public $crud;
    public $header;
    public $data;
    public $disciplinas;
    public $professores;

    public function __construct($title, $crud, $header, $data, $disciplinas, $professores)
    {
        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->disciplinas = $disciplinas;
        $this->professores = $professores;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable-vinculo');
    }
}

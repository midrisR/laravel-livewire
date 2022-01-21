<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Categorie;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class sideCategorie extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $currentUrl ;

    public function __construct()
    {
             $this->currentUrl = request()->getPathInfo();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $filter  = Type::where('name','LIKE','%pipe%')->get();
        $sagment = request()->segment(2);
        return view('components.side-categorie',[
            'categories' => Categorie::all(),
            'types' =>  $sagment === "Pipa" ? $filter : Type::all()
        ]);
    }
}
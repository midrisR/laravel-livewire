<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Banner;
use App\Models\Categorie;
use App\Models\Brand;

class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.home',[
            'banners' => Banner::all(),
            'categories' => Categorie::all(),
            'brands' => Brand::all(),
        ])->layout('layouts.index');
    }
}
<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class CategoryById extends Component
{
    use WithPagination;
    public $cid,$currentUrl;
    public $type = '';
    public $page = 1;

   protected $listeners = ['sort' => 'filter'];
    protected $queryString = [
        'type' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ]; 
    
    public function mount($id)
    {
        $this->cid = $id ;
        $this->currentUrl = request()->getPathInfo();
    }
    
    public function filter ($query)
    {
        $this->type = $query;
    }
    
    public function render()
    {
       $products =  Product::orWhere(function($query) {
        $query->where('categorie_id', $this->cid)
        ->where(function ($query) {
            $query->where('name', 'like', '%'.$this->type.'%' )
                  ->orWhere('description', 'like', '%'.$this->type.'%' );
        });   
    })
    ->orderBy('id','desc')
    ->paginate(12);
    return view('livewire.frontend.category-by-id',['products' => $products])->layout('layouts.index');
    }
}
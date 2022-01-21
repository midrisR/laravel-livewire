<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Type;




class Types extends Component
{
    public $open, $delete, $name, $action;

    protected $rules = [
        'name' => 'required',
    ];

    protected $listeners = ['create'=>'$refresh'];

    public function openModal ()
    {
        $this->open = true;
        $this->action = 'create';
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function modalEdit( $id) 
    {
        $this->open = $id;
        $this->action = 'update';
        $ty  = Type::find($id);
        $this->name = $ty->name;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store () 
    {
        $type = new Type;
        $type->name =  $this->name;
        $type->save();
        $this->reset(['open','name']);
        $this->emit('create');
    }

    public function destroy( Type $type) 
    {
        $type->delete();
        $this->delete = false;
    }

    public function update (Type $type)
    {
        $type->name =  $this->name;
        $type->save();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.product.types',[
            'types' => Type::all()
        ])->layout('layouts.dashboard');
    }
}
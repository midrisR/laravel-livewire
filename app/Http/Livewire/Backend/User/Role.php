<?php

namespace App\Http\Livewire\Backend\User;

use Livewire\Component;
use App\Models\Role as Roles;




class Role extends Component
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
        $role  = Roles::find($id);
        $this->name = $role->name;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store () 
    {
        $role = new Roles;
        $role->name =  $this->name;
        $role->save();
        $this->reset(['open','name']);
        $this->emit('create');
    }

    public function destroy( Roles $role) 
    {
        $role->delete();
        $this->delete = false;
    }

    public function update (Role $role)
    {
        
        $role->name =  $this->name;
        $role->save();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.user.role',[
            'roles' => Roles::all()
        ])->layout('layouts.dashboard');
    }
}
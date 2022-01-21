<?php

namespace App\Http\Livewire\Backend\User;
use App\Models\Employe as Employes;
use App\Models\Role;
use Livewire\Component;

class Employe extends Component
{
     public $open, $delete,  $action, $name, $status, $role_id, $phone, $email;
    
     
    protected $rules = [
        'name' => 'required',
        'status' => 'required',
        'role_id' => 'required',
        'phone' => 'required|numeric',
        'email'=> 'required|email:rfc'
    ];

    protected $listeners = ['create'=>'$refresh'];

    public function openModal ()
    {
        $this->open = true;
        $this->action = 'create';
        $this->reset(['name','status','role_id','phone','email']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function modalEdit( $id) 
    {
        $this->open = $id;
        $this->action = 'update';
        $employe  = Employes::find($id);
        $this->name = $employe->name;
        $this->role_id = $employe->role_id;
        $this->status = $employe->status;
        $this->phone = $employe->phone;
        $this->email = $employe->email;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store () 
    {
        $this->validate();
        $employe = new Employes;
        $employe->name =  $this->name;
        $employe->status =  $this->status;
        $employe->role_id =  $this->role_id;
        $employe->phone =  $this->phone;
        $employe->email =  $this->email;
        $employe->save();
        $this->reset(['open','name','role_id','status','email','phone']);
        $this->emit('create');
    }

    public function destroy(Employes $employe) 
    {
        $employe->delete();
        $this->delete = false;
    }

    public function update (Employes $employe)
    {
        $employe->name =  $this->name;
        $employe->role_id =  $this->role_id;
        $employe->status =  $this->status;
        $employe->phone =  $this->phone;
        $employe->email =  $this->email;
        $employe->save();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.user.employe',[
            'employes' => Employes::all(),
            'roles' => Role::all()
        ])->layout('layouts.dashboard');
    }
}
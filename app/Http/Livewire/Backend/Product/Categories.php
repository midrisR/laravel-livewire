<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search, $name, $description, $image, $status ,$catIdm, $type;
    public $openSelect , $confirmDetele, $confirmEdit, $delete = false;
    protected $listeners = ['confirmDelete'];
    protected $rules = [
        'name' => 'required',
        'status'=> 'required',
        'image' => 'image|max:1024',
    ];

    function openSelect ()
    {
        $this->openSelect= !$this->openSelect;
    }
    
    public function store()
    {
        $this->validate();
        $ImageName = md5($this->image . microtime()).'.'.$this->image->extension();
        $this->image->storeAs('photos/categories', $ImageName);
        Categorie::create([
            'name' => $this->name,
            'description'=> $this->description,
            'image'=> $ImageName,
            'status'=> $this->status,
        ]);
        $this->reset();
        session()->flash('message', 'Product successfully created.');
    }

    public function openModal()
    {
        $this->confirmEdit = true;
        $this->type= 'create';
        $this->reset(['name','status','image','description','openSelect']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function confirmCategorieEdit( $id) 
    {
        $this->confirmEdit = $id;
        $this->type = 'update';
        $cat  =  Categorie::find($id);
        $this->name = $cat->name;
        $this->description = $cat->description;
        $this->image = $cat->image;
        $this->status = $cat->status;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit (Categorie $categorie)
    {
        $categorie->name = $this->name;
        $categorie->description = $this->description;
        $categorie->status = $this->status;
        $categorie->save();
        $this->confirmEdit = false;
        $this->reset(['name','status','image','description','type','openSelect']);
        $this->resetErrorBag();
        $this->resetValidation();
    }


    

    public function confirmCategorieDeletion( $id) 
    {
        $this->confirmDetele = $id;
    }

    public function destroy( Categorie $categorie) 
    {
        $categorie->delete();
        $this->confirmDetele = false;
        session()->flash('message', 'Item Deleted Successfully');
    }



    public function render()
    {
        $cat =  Categorie::where('name','like' ,'%'.$this->search.'%');
        return view('livewire.backend.product.categories',[
            'categories' =>$cat
            ->paginate('5')
        ])
        ->layout('layouts.dashboard');;
    }
}
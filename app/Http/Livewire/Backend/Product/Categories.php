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
    public $isOpen , $openSelect , $confirmDetele, $confirmEdit, $delete = false;
    protected $listeners = ['confirmDelete'];
    protected $rules = [
        'name' => 'required',
        'status'=> 'required',
        'image' => 'image|max:1024',
    ];


    public function handleModal ()
    {
        $this->isOpen = true;
        $this->type= "ADD";
    }
    
    public function closeModal ()
    {
        $this->reset(['name','status','image','type']);
        $this->isOpen = false;
        $this->resetErrorBag();
        $this->resetValidation();
    }

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
        $this->closeModal();
        $this->reset();
        session()->flash('message', 'Product successfully created.');
    }


    public function confirmCategorieEdit( $id) 
    {
        $this->confirmEdit = $id;
        $cat  =  Categorie::find($id);
        $this->name = $cat->name;
        $this->description = $cat->description;
        $this->image = $cat->image;
        $this->status = $cat->status;
        $this->type = "UPDATE";
    }

    public function edit (Categorie $categorie)
    {
        $categorie->name = $this->name;
        $categorie->description = $this->description;
        $categorie->status = $this->status;
        $categorie->save();
        $this->confirmEdit = false;
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
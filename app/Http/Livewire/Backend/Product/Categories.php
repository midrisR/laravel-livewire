<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Categories extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search, $name, $description, $image, $status ,$catIdm, $type, $oldImage;
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
        session()->flash('message', 'Product successfully updated.');
    }

    public function openModal()
    {
        $this->type = 'create';
        $this->confirmEdit = true;
        $this->reset(['name','status','image','description','openSelect']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function confirmCategorieEdit( $id) 
    {
        $this->confirmEdit = $id;
        $cat  = Categorie::find($id);
        $this->name = $cat->name;
        $this->description = $cat->description;
        $this->oldImage = $cat->image;
        $this->status = $cat->status;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit (Categorie $categorie)
    {
        // dd($this->image);
        $ImageName =  md5( $this->image . microtime()).'.'. $this->image->extension();
        if($this->image)
        {
            $categorie->image =$ImageName; 
            Storage::delete("photos/categories/$categorie->id/$this->oldImage");
        }
        $categorie->name = $this->name;
        $categorie->description = $this->description;
        $categorie->status = $this->status;
        $categorie->save();
        $this->image->storeAs('photos/categories/'.$categorie->id.'/', $ImageName);
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
        $cat =  Categorie::where('name','like' ,'%'.$this->search.'%')->paginate('5');
        return view('livewire.backend.product.categories',[
            'categories' =>$cat
        ])
        ->layout('layouts.dashboard');;
    }
}
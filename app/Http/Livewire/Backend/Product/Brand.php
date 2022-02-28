<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Brand as Merek;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Brand extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $image, $brandID, $oldImage,$type, $search;
    public $openSelect , $confirmDetele, $confirmEdit, $delete = false;
    protected $listeners = ['confirmDelete'];
    
    protected $rules = [
        'name' => 'required',
        'image' => 'required|image|max:1024|mimes:jpg,png,jpeg,svg',
    ];

    function openSelect ()
    {
        $this->openSelect= !$this->openSelect;
    }
    
    public function store()
    {
        $this->validate();
        $ImageName = md5($this->image . microtime()).'.'.$this->image->extension();
        $this->image->storeAs('photos/brand', $ImageName);
        Merek::create([
            'name' => $this->name,
            'image'=> $ImageName,
        ]);
        $this->reset();
        session()->flash('message', 'Product successfully updated.');
    }

    public function openModal()
    {
        $this->type = 'create';
        $this->confirmEdit = true;
        $this->reset(['name','image','openSelect']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function confirmCategorieEdit($id) 
    {
        $this->confirmEdit = $id;
        $brand  = Merek::find($id);
        $this->name = $brand->name;
        $this->oldImage = $brand->image;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit (Merek $merek)
    {
        // dd($this->image);
        $ImageName =  md5( $this->image . microtime()).'.'. $this->image->extension();
        if($this->image)
        {
            $merek->image =$ImageName; 
            Storage::delete("photos/brand/$merek->id/$this->oldImage");
        }
        $merek->name = $this->name;
        $merek->save();
        $this->image->storeAs('photos/brand/'.$merek->id.'/', $ImageName);
        $this->confirmEdit = false;
        $this->reset(['name','image','type','openSelect']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function confirmCategorieDeletion( $id) 
    {
        $this->confirmDetele = $id;
    }

    public function destroy( Merek $merek) 
    {
        $merek->delete();
        $this->confirmDetele = false;
        session()->flash('message', 'Brand Deleted Successfully');
    }



    public function render()
    {
        $brand =  Merek::where('name','like' ,'%'.$this->search.'%')->paginate(5);
        return view('livewire.backend.product.brand',[
            'brands' =>$brand
            ])->layout('layouts.dashboard');
    }
}
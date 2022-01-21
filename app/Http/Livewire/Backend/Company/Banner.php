<?php

namespace App\Http\Livewire\Backend\Company;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Banner as Banners;

class Banner extends Component
{
    use WithFileUploads;
    public $openModal , $image , $status , $type , $oldImage,$confirmDetele, $confirmEdit;


    public function openModal()
    {
        $this->type = 'create';
        $this->openModal = true;
        $this->reset(['image']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function openModalDelete( $id) 
    {
        $this->confirmDetele = $id;
    }

    public function openModalEdit ($id)
    {
        $this->openModal = $id;
        $this->type = 'update';
        $banner = Banners::find($id);
        $this->oldImage = $banner->image;
    }

    public function store ()
    {
        $this->validate([
            // 'image' => 'required|image|max:1024|dimensions:max_width=100,max_height=100',
            'image'=>'required|image|max:1024',
            'status' => 'required'
        ]);
        $ImageName =  md5( $this->image . microtime()).'.'. $this->image->extension();

        Banners::create([
            'image' => $ImageName,
            'status' => $this->status
        ]);
        $this->image->storeAs('photos/banners/',$ImageName );
        $this->reset();
    }

    public function destroy (Banners $banners)
    {
        $banners->delete();
        $this->confirmDetele = false;
        Storage::delete("photos/banners/$banners->image");
    }
    
    public function render()
    {
        return view('livewire.backend.company.banner',[
            'banners' => Banners::all(),
        ])->layout('layouts.dashboard');
    }
}
<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Categorie;
use App\Models\Type;
use App\Models\Product;
use Ramsey\Uuid\Uuid;
use App\Models\Image;
use App\Models\Brand;

use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;
    public $name, $status, $type_id, $brand_id, $categorie_id, $description, $meta_description, $meta_keywords, $imagePreview, $pId;
    public $image = [];
    public $oldImage = [];
    public $product;
    protected $listeners = ['editProduct', 'product-edited' => '$refresh'];

    public function mount($id)
    {
        $this->product =  Product::find($id);
        $this->oldImage = $this->product->image;
        $this->name =  $this->product->name;
        $this->status =  $this->product->status;
        $this->type_id =  $this->product->type_id;
        $this->brand_id =  $this->product->brand_id;
        $this->categorie_id =  $this->product->categorie_id;
        $this->description =  $this->product->description;
        $this->meta_description =  $this->product->meta_description;
        $this->meta_keywords =  $this->product->meta_keywords;
        $this->pId = $id;
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'brand_id' => 'required',
            'categorie_id' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);
        $x =  Product::where('id', $this->pId)
            ->update([
                'name' => $this->name,
                'status' => $this->status,
                'type_id' => $this->type_id,
                'brand_id' => $this->brand_id,
                'categorie_id' => $this->categorie_id,
                'description' => $this->description,
                'meta_description' => $this->meta_description,
                'meta_keywords' => $this->meta_keywords,
            ]);
        if ($this->image) {
            $img = Image::firstWhere('product_id', $this->pId)->get();
            foreach ($this->image as $photo) {
                $ImageName =  md5($photo . microtime()) . '.' . $photo->extension();
                Image::create([
                    'name' => $ImageName,
                    'product_id' => $this->pId
                ]);
                $photo->storeAs('photos/products/' . $this->pId, $ImageName);
            }
        }
        $this->dispatchBrowserEvent('editProduct', ['description' => $this->description]);
        session()->flash('message', 'Product successfully Updated.');
        $this->emit("product-edited");
        return redirect()->to('/dashboard/product');
    }

    public function deleteImage($id, $name)
    {
        $image = Image::find($id);
        $image->delete();
        Storage::delete("photos/products/$this->pId/$name");
        $this->emit("product-edited");
    }

    public function render()
    {
        return view('livewire.backend.product.edit-product', [
            'categories' => Categorie::all(),
            'types' => Type::all(),
            'brands' => Brand::all()
        ])->layout('layouts.dashboard');
    }
}
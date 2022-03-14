<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visitor;
use App\Models\Banner;
use Illuminate\Support\Facades\Cookie;
use Image;
use Illuminate\Support\Facades\Storage;
class RegisterChat extends Component
{
     public function render()
    {
        $img = Storage::path('photos/banners/7dc825aeb48739abf9e2c8357950a6da.jpg');
        $filePath = 'storage/thumbnails';
        $image = Image::make($img);
        $name="12345.jpg";
        $image->resize(null, 100, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->response('png');
        // echo $image->response();
        // ->save($filePath.'/'.$name,100,'jpg');
        return view('livewire.component.register-chat',[
            'banners' => Banner::all()
        ]);
    }
}
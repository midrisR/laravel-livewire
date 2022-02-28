<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visitor;
use Illuminate\Support\Facades\Cookie;

class RegisterChat extends Component
{
    public $name;
    public $email;
    public $success;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $register = Visitor::create([
            'name' => $this->name,
            'email' => $this->email
        ]);
        $this->success = true;
        Cookie::queue('name', 'value', 36000);
    }

    public function render()
    {
        return view('livewire.component.register-chat');
    }
}

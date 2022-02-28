<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat as Message;
use App\Models\Visitor;
use Illuminate\Support\Facades\Cookie;


class Chat extends Component
{

    public $message;
    public $name;
    public $email;
    public $success;
    public $from_id;
    public $visitor_id;

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
        Cookie::queue('visitor', $register->id, 36000);
    }

    public function send ()
    {
        Message::create([
            'chat' => $this->message,
            'to_id' =>1,
            'visitor_id' =>  Cookie::get('visitor'),
        ]);
        $this->message = null;
    }

    public function render()
    {
        $chat = [];
        $visitor = Cookie::get('visitor');

        if($visitor){
            $chat = Message::where('visitor_id',$visitor)
            ->orWhere('to_id',$visitor)
            ->get();
        }
        return view('livewire.chat',[
            'chats' => $chat
        ])->layout('layouts.index');
    }
}

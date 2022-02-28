<?php

namespace App\Http\Livewire\Backend\User;

use Livewire\Component;
use App\Models\Visitor;
use App\Models\Chat as Message;
use Illuminate\Support\Facades\Auth;

class Chats extends Component
{

    public $open = false;
    public $chats = [];
    public $message;
    public $from_id;
    public $success;

    public function getChats()
    {
        $this->chats = Message::where('visitor_id',$this->from_id)
        ->orWhere('to_id',$this->from_id)
        ->get();
    }

    public function render()
    {
        return view('livewire.backend.user.chats',[
            'visitors' => Visitor::all()
        ])
        ->layout('layouts.dashboard');
    }

    public function send ()
    {
 
        Message::create([
            'chat' => $this->message,
            'to_id' => $this->from_id,
            'visitor_id' => Auth::user()->id,
        ]);
        $this->message = null;
    }


    public function openChat($vId)
    {
        $this->from_id = $vId;
        $uid = Auth::user()->id;
        $data = Message::where('visitor_id',$vId)
       ->orWhere('to_id',$vId)
       ->get();
      if(!$data->isEmpty()){
        $this->chats = $data;
      }
 
    }
}

<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\Visitor;
use Livewire\Component;
use App\Models\Chat as Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Chats extends Component
{

    public $show = false;
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
        $data = Message::join('visitors', 'chats.to_id', '=', 'visitors.id')
        ->where('to_id', '!=', 1)
        ->orWhere('visitor_id', '!=', 1)
        // ->select('chats.*','chats.created_at as frist_chat_time','visitors.id as visitor_id','visitors.name')
            ->get();
        $collection = collect($data);
        $unique = $collection->unique('to_id');;
    

        return view('livewire.backend.user.chats',[
            'visitors' => Visitor::all()
        ])
        ->layout('layouts.dashboard');
    }

    public function send ()
    {
        $this->validate([
            'message' => 'required'
        ]);
 
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
      if(!$data->isEmpty()) {
        $this->chats = $data;
      }
    }

    public function endChat ()
    {
      Cookie::queue(Cookie::forget('visitor'));
    }
}
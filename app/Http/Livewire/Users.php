<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component   
{
    public $search = '';
    public $users;
    public function render()
    {

        if(empty($this->search)) {
            $this->users = User::paginate(25);
        }
        else {
            $this->users = User::search($this->search)->get();
        }

        return view('livewire.users');
    }
}

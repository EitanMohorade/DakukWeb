<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component   
{
    use WithPagination;

    public $search = '';
    public $users;
    protected $headers = ['ID', 'Nombre', 'Apellido', 'Email', 'Estado', 'Acciones'];
    public function render()
    {

        if(empty($this->search)) {
            $this->users = User::all();
        }
        else {
            $this->users = User::search($this->search)->get();
        }

        return view('livewire.users-table', ['users' => $this->users, 'headers' => $this->headers]);
    }
}

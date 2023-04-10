<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
        return view('livewire.users', ['users' => User::search($this->search)->withTrashed()->paginate(15)]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
        sleep(1);

        return view('livewire.users', ['users' => User::search($this->search, function ($query) {
            $query->where('id', '!=', auth()->id());
        })->withTrashed()->paginate(15)]);
    }
}

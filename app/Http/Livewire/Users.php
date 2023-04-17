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
    public $sortField = 'id';
    public $sortDirection = 'asc';
    // public $status = 'active';
    public $usersPerPage = 15;
    public $paginationValues = [5, 15, 25, 50, 100];

    protected $queryString = ['sortField', 'sortDirection', 'usersPerPage']; // Displaying the sort params in the URL

    public function render()
    {
        sleep(0.5);

        return view('livewire.users', ['users' => User::search($this->search, function ($query) {
            $query->where('id', '!=', auth()->id());
        })->withTrashed()->orderBy($this->sortField, $this->sortDirection)->paginate($this->usersPerPage)]);
    }

    public function sortBy($field) {
        if($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        else {
            $this->sortDirection = 'asc'; // The default sortDirection should always be 'asc'
        }
        $this->sortField = $field;
    }

    public function setPagination($pagination) {
        if($pagination > 0 && $pagination != $this->usersPerPage) {
            $this->usersPerPage = $pagination;
        }
    }

    // Getting users based on the selected status
/*     public function getUsersByStatus($status) {
        return [
            'active' => User::all(),
            'deleted' => User::onlyTrashed(),
            'all' => User::withTrashed(),
        ][$status];
    } */
}

<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $status = 'active';
    public $statusValues = ['active', 'deleted'];
    public $usersPerPage = 15;
    public $paginationValues = [5, 15, 25, 50, 100];

    protected $queryString = ['sortField', 'sortDirection', 'usersPerPage', 'status']; // Displaying the sort params in the URL

    public function render()
    {
        sleep(0.5);
        
        return view('livewire.admin.users.index', ['users' => User::getByStatus($this->search, $this->status)->orderBy($this->sortField, $this->sortDirection)->paginate($this->usersPerPage)]);
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

    public function setStatus($status) {
        if(in_array($status, $this->statusValues) && $this->status != $status) {
            $this->status = $status;
        }
    }

    public function getStatusLabel($status) {
        return [
            'active' => 'Usuarios activos',
            'deleted' => 'Usuarios eliminados',
        ][$status];
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Orders extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $status = 'active';
    public $statusValues = ['active', 'deleted'];
    public $ordersPerPage = 15;
    public $paginationValues = [5, 15, 25, 50, 100];

    protected $queryString = ['sortField', 'sortDirection', 'ordersPerPage', 'status']; // Displaying the sort params in the URL

    public function render()
    {
        sleep(0.5);

        return view('livewire.orders', ['orders' => Order::getByStatus($this->search, $this->status)->orderBy($this->sortField, $this->sortDirection)->paginate($this->ordersPerPage)]);
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
            'active' => 'Ordenes activos',
            'deleted' => 'Ordenes eliminados',
        ][$status];
    }
}

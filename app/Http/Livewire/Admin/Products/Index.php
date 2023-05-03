<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
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
    public $productsPerPage = 15;
    public $paginationValues = [5, 15, 25, 50, 100];

    protected $listeners = ['renderProducts' => 'render'];

    protected $queryString = ['sortField', 'sortDirection', 'productsPerPage', 'status']; // Displaying the sort params in the URL

    public function render()
    {
        sleep(0.5);

        return view('livewire.admin.products.index', ['products' => Product::getByStatus($this->search, $this->status)->orderBy($this->sortField, $this->sortDirection)->paginate($this->productsPerPage)]);
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
        if($pagination > 0 && $pagination != $this->productsPerPage) {
            $this->productsPerPage = $pagination;
        }
    }

    public function setStatus($status) {
        if(in_array($status, $this->statusValues) && $this->status != $status) {
            $this->status = $status;
        }
    }

    public function getStatusLabel($status) {
        return [
            'active' => 'Productos activos',
            'deleted' => 'Productos eliminados',
        ][$status];
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $productsPerPage = 15;
    public $paginationValues = [5, 15, 25, 50, 100];

    protected $queryString = ['sortField', 'sortDirection', 'productsPerPage']; // Displaying the sort params in the URL

    public function render()
    {
        sleep(0.5);

        return view('livewire.products', ['products' => Product::search($this->search)->withTrashed()->orderBy($this->sortField, $this->sortDirection)->paginate($this->productsPerPage)]);
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
}

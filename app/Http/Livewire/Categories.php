<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Categories extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection']; // Displaying the sort params in the URL

    public function render()
    {
        sleep(0.5);

        return view('livewire.categories', ['categories' => Category::search($this->search, function ($query) {
            $query->where('id', '!=', auth()->id());
        })->withTrashed()->orderBy($this->sortField, $this->sortDirection)->paginate(15)]);
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
}

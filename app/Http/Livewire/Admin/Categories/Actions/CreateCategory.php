<?php

namespace App\Http\Livewire\Admin\Categories\Actions;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $openModal = false;
    public $name, $category_id;

    protected $rules = [
        'name' => 'required|max:100',
        'category_id' => 'max:10',
    ];

    public function render()
    {
        return view('livewire.admin.categories.actions.create-category');
    }

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'category_id' => $this->category_id ? $this->category_id : null,
        ]);

        $this->reset(['name', 'category_id']); // Set values to null
        $this->openModal = false; // Close the modal
        session(['alert' => 'success', 'message' => 'Categoría creada exitosamente']); // Setting up session data for success alert
        $this->emit('renderCategories'); // Re-rendering the component
    }

    public function updated($propName)
    {
        $this->validateOnly($propName);
    }
}

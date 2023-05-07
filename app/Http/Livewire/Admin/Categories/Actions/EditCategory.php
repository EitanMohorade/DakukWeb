<?php

namespace App\Http\Livewire\Admin\Categories\Actions;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $openModal = false;
    public $name;
    public $category;



    public function render()
    {
        return view('livewire.admin.categories.actions.edit-category');
    }

    public function handleEdit($id)
    {
        $this->openModal = true;
        $this->category = Category::findOrFail($id);
        $this->name = $this->category->name;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->category->update([
            'name' => $this->name,
        ]);

        $this->openModal = false;

        session()->flash('message', 'Categoria actualizado exitosamente.');
    }
}

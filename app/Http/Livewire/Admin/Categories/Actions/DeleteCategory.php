<?php

namespace App\Http\Livewire\Admin\Categories\Actions;

use App\Models\Category;
use Livewire\Component;

class DeleteCategory extends Component
{
    public $openModal = false;
    public $category = null;

    public function render()
    {
        return view('livewire.admin.categories.actions.delete-category');
    }

    public function handleDelete($id)
    {
        $category = Category::findOrFail($id);
        if ($category->id == auth()->id()) {
            $alert = 'error';
            $message = 'No puedes eliminar tu propio usuario.';
        } else if (!$category->trashed()) {
            $alert = 'success';
            Category::find($category->id)->delete();
            $message = 'Usuario eliminado exitosamente.';
        } else {
            $alert = 'error';
            $message = 'No se puede borrar un usuario ya eliminado o inexistente.';
        }

        $this->openModal = false; // Close the modal
        // session(['alert' => $alert, 'message' => $message]);
        // $this->emit('renderCategories'); Not working for some reason
        return to_route('categories.index')->with(['alert' => $alert, 'message' => $message]);
    }
}


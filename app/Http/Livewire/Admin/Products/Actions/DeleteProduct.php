<?php

namespace App\Http\Livewire\Admin\Products\Actions;;

use App\Modals\Product;
use Livewire\Component;

class DeleteProduct extends Component
{
        public $openModal = false;
        public $product = null;

        public function render()
        {
            return view('livewire.admin.products.actions.delete-product');
        }

        public function handleDelete($id)
        {
            $product = product::findOrFail($id);
            if ($product->id == auth()->id()) {
                $alert = 'error';
                $message = 'No puedes eliminar tu propio producto.';
            } else if (!$product->trashed()) {
                $alert = 'success';
                product::find($product->id)->delete();
                $message = 'Producto eliminado exitosamente.';
            } else {
                $alert = 'error';
                $message = 'No se puede borrar un producto ya eliminado o inexistente.';
            }

            $this->openModal = false; // Close the modal
            // session(['alert' => $alert, 'message' => $message]);
            // $this->emit('renderproducts'); Not working for some reason
            return to_route('products.index')->with(['alert' => $alert, 'message' => $message]);
        }
}

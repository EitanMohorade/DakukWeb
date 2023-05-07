<?php

namespace App\Http\Livewire\Admin\Orders\Actions;;

use App\Modals\Order;
use Livewire\Component;

class DeleteOrder extends Component
{
        public $openModal = false;
        public $order = null;

        public function render()
        {
            return view('livewire.admin.orders.actions.delete-order');
        }

        public function handleDelete($id)
        {
            $order = Order::findOrFail($id);
            if ($order->id == auth()->id()) {
                $alert = 'error';
                $message = 'No puedes eliminar tu propia orden.';
            } else if (!$product->trashed()) {
                $alert = 'success';
                product::find($product->id)->delete();
                $message = 'Orden eliminado exitosamente.';
            } else {
                $alert = 'error';
                $message = 'No se puede borrar una orden ya eliminado o inexistente.';
            }

            $this->openModal = false;
            return to_route('orders.index')->with(['alert' => $alert, 'message' => $message]);
        }
}

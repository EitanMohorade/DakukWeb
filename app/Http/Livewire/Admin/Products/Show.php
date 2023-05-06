<?php

namespace App\Http\Livewire\Admin\Products;;

use App\Modals\Product;
use Livewire\Component;

class Show extends Component
{
        public $openModal = false;
        public $product = null;

        public function render()
        {
            return view('livewire.admin.products.show');
        }

        public function handleClose($id)
        {
            $this->openModal = false; // Close the modal
            return to_route('products.index')->with(['alert' => $alert, 'message' => $message]);
        }
}

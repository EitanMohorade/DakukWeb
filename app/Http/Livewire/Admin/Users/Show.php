<?php

namespace App\Http\Livewire\Admin\Users;;

use App\Modals\User;
use Livewire\Component;

class Show extends Component
{
        public $openModal = false;
        public $user = null;

        public function render()
        {
            return view('livewire.admin.users.show');
        }

        public function handleClose($id)
        {
            $this->openModal = false; // Close the modal
            return to_route('users.index')->with(['alert' => $alert, 'message' => $message]);
        }
}

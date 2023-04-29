<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteUser extends ModalComponent
{
    public User $user;

    public function render()
    {
        return view('livewire.user.delete-user');
    }
}

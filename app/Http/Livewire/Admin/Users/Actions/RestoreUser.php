<?php

namespace App\Http\Livewire\Admin\Users\Actions;

use App\Models\User;
use Livewire\Component;

class RestoreUser extends Component
{
    public $openModal = false;
    public $user = null;

    public function render()
    {
        return view('livewire.admin.users.actions.restore-user');
    }

    public function handleRestore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if ($user->id == auth()->id()) {
            $alert = 'error';
            $message = 'No puedes restaurar tu propio usuario.';
        } else if ($user->trashed()) {
            $user->restore();
            $alert = 'success';
            $message = 'Usuario restaurado exitosamente.';
        } else {
            $alert = 'error';
            $message = 'No se puede restaurar un usuario activo o inexistente.';
        }

        $this->openModal = false; // Close the modal
        return to_route('users.index')->with(['alert' => $alert, 'message' => $message]);
    }
}

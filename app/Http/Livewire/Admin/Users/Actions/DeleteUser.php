<?php

namespace App\Http\Livewire\Admin\Users\Actions;

use App\Http\Controllers\UserController;
use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public $openModal = false;
    public $user = null;

    public function render()
    {
        return view('livewire.admin.users.actions.delete-user');
    }

    public function handleDelete($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == auth()->id()) {
            $alert = 'error';
            $message = 'No puedes eliminar tu propio usuario.';
        } else if (!$user->trashed()) {
            $alert = 'success';
            User::find($user->id)->delete();
            $message = 'Usuario eliminado exitosamente.';
        } else {
            $alert = 'error';
            $message = 'No se puede borrar un usuario ya eliminado o inexistente';
        }

        $this->openModal = false; // Close the modal
        // session(['alert' => $alert, 'message' => $message]);
        // $this->emit('renderUsers'); Not working for some reason
        return to_route('users.index')->with(['alert' => $alert, 'message' => $message]);
    }
}

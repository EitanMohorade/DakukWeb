<?php

namespace App\Http\Livewire\Admin\Users\Actions;

use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $isOpen = false;
    public $name, $email, $password;

    protected $rules = [
        'name' => 'required|max:10',
        'email' => 'required|email:rfc,dns|unique:users|max:255',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.admin.users.actions.create-user');
    }

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name', 'email', 'password']); // Set values to null
        $this->isOpen = false; // Close the modal
        session(['alert' => 'success', 'message' => 'Usuario creado exitosamente.']); // Setting up session data for success alert
        $this->emit('renderUsers'); // Re-rendering the component
    }

    public function updated($propName)
    {
        $this->validateOnly($propName);
    }
}

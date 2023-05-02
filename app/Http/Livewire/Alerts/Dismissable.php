<?php

namespace App\Http\Livewire\Alerts;

use Livewire\Component;

class Dismissable extends Component
{
    public $type;
    public $color;
    public $types = ['info', 'success', 'warning', 'danger'];

    public function render()
    {
        return view('livewire.alerts.dismissable', ['message' => session('message')]);
    }

    public function mount()
    {
        $this->type = $this->getTypeByStatus();
        $this->color = $this->getStatusColorAttribute();
    }

    public function dehydrate(){
        session()->forget(['alert', 'message']);
    }

    protected function getStatusColorAttribute()
    {
        return [
            'info' => 'blue',
            'success' => 'green',
            'warning' => 'yellow',
            'danger' => 'red',
        ][$this->type];
    }

    protected function getTypeByStatus()
    {
        return session('alert') ? [
            'status' => 'info',
            'success' => 'success',
            'warning' => 'warning',
            'error' => 'danger',
        ][session('alert')] : 'info';
    }
}

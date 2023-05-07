<?php

namespace App\Http\Livewire\Admin\Orders\Actions;

use App\Models\Order;
use Livewire\Component;

class CommentOrder extends Component
{
    public $openModal = false;
    public $comments;
    public $order;

    public function render()
    {
        return view('livewire.admin.orders.actions.comment-order');
    }

    public function handleEdit($id)
    {
        $this->openModal = true;
        $this->order = Order::findOrFail($id);
        $this->comments = $this->order->comments;}

        public function update()
        {
            $this->validate([
                'comments' => 'required',
            ]);

            $this->order->update([
                'comments' => $this->comments,
            ]);

            $this->openModal = false;

            session()->flash('message', 'Orden comentada exitosamente.');
        }
}

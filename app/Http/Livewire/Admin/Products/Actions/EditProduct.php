<?php

namespace App\Http\Livewire\Admin\Products\Actions;

use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{
    public $openModal = false;
    public $name, $description, $price, $stock;
    public $product;



    public function render()
    {
        return view('livewire.admin.products.actions.edit-product');
    }

    public function handleEdit($id)
    {
        $this->openModal = true;
        $this->product = Product::findOrFail($id);
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->stock = $this->product->stock;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $this->product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
        ]);

        $this->openModal = false;

        session()->flash('message', 'Producto actualizado exitosamente.');
    }
}

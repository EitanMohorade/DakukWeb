<?php

namespace App\Http\Livewire\Admin\Products\Actions;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $openModal = false;
    public $name, $description, $price, $stock;

    protected $rules = [
        'name' => 'required', //WITH: |alpha_num:ascii|min:3|max:255 THERE IS AN ERROR
        'description' => 'required', //WITH: |alpha_num:ascii|min:3|max:1024 THERE IS AN ERROR
        'price' => 'required', //WITH |numeric|gt:0 THERE IS AN ERROR
        'stock' => 'required',
        //'image' => 'required|image|dimensions:min_width=100,min_height=100',
    ];

    public function render()
    {
        return view('livewire.admin.products.actions.create-product');
    }

    public function save()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            //'category_id' => 1,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            //'image' =>  $imageName,
        ]);

        $this->reset(['name', 'description', 'price', 'stock']); // Set values to null
        $this->openModal = false; // Close the modal
        session(['alert' => 'success', 'message' => 'Producto creado exitosamente.']); // Setting up session data for success alert
        $this->emit('renderProducts'); // Re-rendering the component
    }

    public function updated($propName)
    {
        $this->validateOnly($propName);
    }
}

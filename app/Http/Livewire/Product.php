<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product as ProductModel;

class Product extends Component
{
    public $product;
    public $productID;

    public function mount() {
        $this->product = ProductModel::find($this->productID);
    }

    public function render()
    {
        return view('livewire.product');
    }

    /**
     * Increment the product stock
     */
    public function increment() {
        $this->product->incrementStock();
    }

    /**
     * Decrement the product stock
     */
    public function decrement() {
        $this->product->decrementStock();
    }

    /**
     * (Soft)Delete the product
     */
    public function delete() {
        $delete = $this->product->delete();
        // Notify the parent to refresh the product listing
        $this->emitUp('delete');
    }
}

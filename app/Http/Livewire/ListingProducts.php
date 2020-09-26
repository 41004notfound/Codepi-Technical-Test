<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ListingProducts extends Component
{
    public $products;

    // True to show the adding form, false to hide it
    public $adding;

    protected $listeners = ['delete' => 'mount', 'update' => 'mount', 'insert' => 'mount'];

    public function mount() {
        $this->products = Product::orderBy('id', 'DESC')->get();
        $this->adding = false;
    }

    public function render()
    {
        return view('livewire.listing-products', [
            'products' => $this->products
        ]);
    }

    /**
     * Show the add product form
     */
    public function addProduct() {
        $this->adding = true;
    }
}

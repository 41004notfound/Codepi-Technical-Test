<?php

namespace App\Http\Livewire;

use App\Category;
use App\Characteristic;
use Livewire\Component;
use App\Product as ProductModel;

class Product extends Component
{
    public $product;
    public $productID;
    public $edit;
    public $selected_categories;
    public $selected_characteristics;

    // Categories & characteristics select list
    public $categories;
    public $characteristics;

    // Rules for validation
    protected $rules = [
        'product.name' => 'required|min:3|max:25',
        'product.description' => 'max:255',
        'product.price_ttc' => 'required|int|min:0',
        'product.stock' => 'required|int|min:0',
        'selected_categories' => 'required|min:3',
        'selected_characteristics' => 'required|min:3',
    ];

    protected $listeners = ['update' => 'mount'];

    public function mount() {
        $this->product = ProductModel::find($this->productID);
        $this->categories = Category::all();
        $this->characteristics = Characteristic::all();
        $this->edit = false;
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

    /**
     * Edit the product
     */
    public function save()
    {
        $this->validate();

        $this->product->resetCategories();
        $this->product->resetCharacteristics();

        $this->product->addCategories($this->selected_categories);
        $this->product->addCharacteristics($this->selected_characteristics);

        $this->product->save();

        // Refresh component
        $this->mount();
    }
}

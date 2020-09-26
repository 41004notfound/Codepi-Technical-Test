<?php

namespace App\Http\Livewire;

use App\Category;
use App\Characteristic;
use Livewire\Component;
use App\Product as ProductModel;

class Product extends Component
{
    // Product model
    public $product;

    // Product ID provided by parent component
    public $productID;

    // True to show edit product form, false to hide
    public $edit;

    // Categories & characteristics select list
    public $categories;
    public $characteristics;
    public $selected_categories;
    public $selected_characteristics;

    // Rules for validation
    protected $rules = [
        'product.name' => 'required|min:3|max:25',
        'product.description' => 'max:255',
        'product.price_ttc' => 'required|int|min:0',
        'product.stock' => 'required|int|min:0',
        'selected_categories' => 'required|min:3',
        'selected_characteristics' => 'required|min:3',
    ];

    // Custom messages for Validation
    protected $messages = [
        'product.name.min' => 'Le nombre de caractères doit être compris entre 3 et 25.',
        'product.name.required' => 'Ce champ doit être complété.',
        'product.description.min' => 'Le nombre de caractères doit être compris entre 0 et 255.',
        'product.price_ttc.required' => 'Ce champ doit être complété.',
        'product.price_ttc.min' => 'Le prix doit être au minimum de 0.',
        'product.stock.required' => 'Ce champ doit être complété.',
        'product.stock.min' => 'Le stock doit être au minimum de 0.',
        'selected_categories.*'  => 'Vous devez selectionner au minimum 3 catégories.',
        'selected_characteristics.*'  => 'Vous devez selectionner au minimum 3 caractéristiques.',
    ];

    // Listeners for updates
    protected $listeners = ['update' => 'mount'];

    public function mount() {
        $this->product = ProductModel::find($this->productID);
        $this->categories = Category::all();
        $this->characteristics = Characteristic::all();
        $this->edit = false;
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
     * Edit the product
     */
    public function save() {
        $this->validate();

        // Reset categories & characteristics
        $this->product->resetCategories();
        $this->product->resetCharacteristics();

        // Attach selected categories & characteristics
        $this->product->addCategories($this->selected_categories);
        $this->product->addCharacteristics($this->selected_characteristics);

        $this->product->save();

        // Refresh component
        $this->mount();
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

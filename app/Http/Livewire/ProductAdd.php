<?php

namespace App\Http\Livewire;

use App\Product;
use App\Category;
use App\Characteristic;

use Livewire\Component;

class ProductAdd extends Component
{
    // Product fields
    public $name;
    public $description;
    public $price_ttc;
    public $stock;

    // Categories & characteristics select list
    public $categories;
    public $characteristics;

    // Array of selected categories & characteristics to link
    public $selected_categories;
    public $selected_characteristics;

    // True to show the adding input, false to hide it
    public $adding_category;
    public $adding_characteristic;

    // The new category & characteristic to add
    public $new_category;
    public $new_characteristic;

    // Rules for validation
    protected $rules = [
        'name' => 'required|min:3|max:25',
        'description' => 'max:255',
        'price_ttc' => 'required|int|min:0',
        'stock' => 'required|int|min:0',
        'selected_categories' => 'required|min:3',
        'selected_characteristics' => 'required|min:3',
    ];

    // Custom messages for Validation
    protected $messages = [
        'name.min' => 'Le nombre de caractères doit être compris entre 3 et 25.',
        'name.required' => 'Ce champ doit être complété.',
        'description.min' => 'Le nombre de caractères doit être compris entre 0 et 255.',
        'price_ttc.required' => 'Ce champ doit être complété.',
        'price_ttc.min' => 'Le prix doit être au minimum de 0.',
        'stock.required' => 'Ce champ doit être complété.',
        'stock.min' => 'Le stock doit être au minimum de 0.',
        'selected_categories.*'  => 'Vous devez selectionner au minimum 3 catégories.',
        'selected_characteristics.*'  => 'Vous devez selectionner au minimum 3 caractéristiques.',
    ];

    public function mount() {
        $this->categories = Category::all();
        $this->characteristics = Characteristic::all();
    }

    /**
     * Submit the add product form
     */
    public function submit() {
        $this->validate();
        $product = Product::create([
            'name' => $this->name,
            'description' => ($this->description ?? ''),
            'price_ttc' => $this->price_ttc,
            'price_htva' => $this->price_ttc * 0.80,
            'stock' => $this->stock,
        ]);
        $product->addCategories($this->selected_categories);
        $product->addCharacteristics($this->selected_characteristics);

        if($this->new_category)
            $product->addToNewCategory($this->new_category);
        if($this->new_characteristic)
            $product->addToNewCharacteristic($this->new_characteristic);

        // Notify the parent to refresh the product listing
        $this->emitUp('insert');
    }

    /**
     * Show the create & add new category input
     */
    public function newCategory() {
        $this->adding_category = !$this->adding_category;
    }

    /**
     * Show the create & add new characteristic input
     */
    public function newCharacteristic() {
        $this->adding_characteristic = !$this->adding_characteristic;
    }
}

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
    public $selectedCategories;
    public $selectedCharacteristics;

    // True to show the adding input, false to hide it
    public $addingCategory;
    public $addingCharacteristic;

    // The new category & characteristic to add
    public $new_category;
    public $new_characteristic;

    // Rules for validation
    protected $rules = [
        'name' => 'required|min:3|max:25',
        'description' => 'max:255',
        'price_ttc' => 'required|int|min:0',
        'stock' => 'required|int|min:0',
    ];

    public function mount() {
        $this->categories = Category::all();
        $this->characteristics = Characteristic::all();
    }

    public function render()
    {
        return view('livewire.product-add', [
            'categories' => $this->categories,
            'characteristics' => $this->characteristics,
            'selectedCategories' => $this->selectedCategories,
            'selectedCharacteristics' => $this->selectedCharacteristics,
            'new_category' => $this->new_category,
            'new_characteristic' => $this->new_characteristic
        ]);
    }

    /**
     * Submit the add product form
     */
    public function submit()
    {
        $this->validate();

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price_ttc' => $this->price_ttc,
            'price_htva' => $this->price_ttc * 0.80,
            'stock' => $this->stock,
        ]);
        $product->addCategories($this->selectedCategories);
        $product->addCaracteristics($this->selectedCharacteristics);

        if($this->new_category)
            $product->addCategory($this->new_category);

        // Notify the parent to refresh the product listing
        $this->emitUp('insert');
    }

    /**
     * Show the create & add new category input
     */
    public function newCategory() {
        $this->addingCategory = true;
    }

    /**
     * Show the create & add new characteristic input
     */
    public function newCharacteristic() {
        $this->addingCharacteristic = true;
    }
}

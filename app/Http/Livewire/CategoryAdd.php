<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class CategoryAdd extends Component
{
    // Category fields
    public $name;
    public $description;

    // Parent categories select list
    public $parent_categories;

    // Parent category values
    public $is_parent;
    public $selected_parent_category;

    // Rules for validation
    protected $rules = [
        'name' => 'required|min:3|max:25',
        'description' => 'max:255',
    ];

    public function mount() {
        $this->parent_categories = Category::parents()->get();
        $this->is_parent = true;

        // Default parent
        $this->selected_parent_category = 1;
    }

    /**
     * Submit the add category form
     */
    public function submit() {
        $this->validate();
        $category = Category::create([
            'name' => $this->name,
            'description' => ($this->description ?? ''),
        ]);

        // Define category parent
        if($this->is_parent)
            $category->parent = $category->id;
        else
            $category->parent = $this->selected_parent_category;

        $category->save();

        // Refresh products
        $this->emitTo('product', 'update');

        // Notify the parent to refresh the category listing
        $this->emitUp('insert');
    }
}

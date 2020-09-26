<?php

namespace App\Http\Livewire;

use App\Category as CategoryModel;
use Livewire\Component;

class Category extends Component
{
    // Category model
    public $category;

    // Category ID provided by parent component
    public $categoryID;

    // True to show edit category form, false to hide
    public $edit;

    // True is this category is parent, false if not
    public $is_parent;

    // Parent categories select list
    public $parent_categories;
    public $selected_parent_category;

    // Rules for validation
    protected $rules = [
        'category.name' => 'required|min:3|max:25',
        'category.description' => 'max:255',
    ];

    public function mount() {
        $this->category = CategoryModel::find($this->categoryID);
        $this->parent_categories = CategoryModel::parents()->get();
        $this->edit = false;
        $this->is_parent = $this->category->isParent();

        // Default parent
        $this->selected_parent_category = 1;
    }

    /**
     * Edit the product
     */
    public function save() {
        $this->validate();

        // Define category parent
        if($this->is_parent)
            $this->category->parent = $this->category->id;
        else
            $this->category->parent = $this->selected_parent_category;

        $this->category->save();

        // Refresh products
        $this->emitTo('product', 'update');

        // Refresh parent component
        $this->emitUp('update');

        // Refresh component
        $this->mount();
    }
}

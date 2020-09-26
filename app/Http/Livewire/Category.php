<?php

namespace App\Http\Livewire;

use App\Category as CategoryModel;
use Livewire\Component;

class Category extends Component
{
    public $category;
    public $categoryID;
    public $edit;
    public $is_parent;
    public $selected_parent_category;

    // Parent categories select list
    public $parent_categories;

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
    }

    /**
     * Edit the product
     */
    public function save() {
        $this->validate();

        if($this->is_parent)
            $this->category->parent = $this->category->id;
        else
            $this->category->parent = $this->selected_parent_category;

        $this->category->save();

        // Refresh component
        $this->emitUp('update');
        $this->mount();
    }
}

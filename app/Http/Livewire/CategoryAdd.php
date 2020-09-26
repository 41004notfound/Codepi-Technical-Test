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
    }

    public function render()
    {
        return view('livewire.category-add', [
            'parent_categories' => $this->parent_categories,
            'selected_parent_category' => $this->selected_parent_category,
        ]);
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

        if($this->is_parent)
            $category->parent = $category->id;
        else
            $category->parent = $this->selected_parent_category;
        $category->save();

        // Notify the parent to refresh the category listing
        $this->emitUp('insert');
    }
}

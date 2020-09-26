<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class ListingCategories extends Component
{
    // Categories models
    public $categories;

    // True to show the adding form, false to hide it
    public $adding;

    // True to show the editing form, false to hide it
    public $edit;

    // Listeners for updates
    protected $listeners = ['insert' => 'mount', 'update' => 'mount'];

    public function mount() {
        $this->categories = Category::orderBy('id')->get()->groupBy('parent')->all();
        $this->adding = false;
        $this->edit = false;
    }

    /*public function refresh() {
        // Notify the parent to refresh the category listing
        $this->emit('update');
    }*/
}

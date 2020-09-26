<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class ListingCategories extends Component
{
    public $categories;

    // True to show the adding form, false to hide it
    public $adding;
    // True to show the editing form, false to hide it
    public $edit;

    protected $listeners = ['insert' => 'mount', 'update' => 'mount', 'adding' => 'refresh'];

    public function mount() {
        $this->categories = Category::orderBy('id')->get()->groupBy('parent')->all();
        $this->adding = false;
        $this->edit = false;
    }

    public function refresh() {
        $this->emit('update');
    }
}

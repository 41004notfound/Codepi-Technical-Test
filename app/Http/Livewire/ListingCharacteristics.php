<?php

namespace App\Http\Livewire;

use App\Characteristic;
use Livewire\Component;

class ListingCharacteristics extends Component
{
    // Characteristics models
    public $characteristics;

    // True to show the adding form, false to hide it
    public $adding;

    // True to show the editing form, false to hide it
    public $edit;

    // Listeners for updates
    protected $listeners = ['insert' => 'mount', 'update' => 'mount'];

    public function mount() {
        $this->characteristics = Characteristic::orderBy('name')->get();
        $this->adding = false;
        $this->edit = false;
    }
}

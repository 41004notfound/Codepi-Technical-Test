<?php

namespace App\Http\Livewire;

use App\Characteristic;
use Livewire\Component;

class ListingCharacteristics extends Component
{
    public $characteristics;

    public function mount() {
        $this->caracteristics = Characteristic::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.listing-characteristics', [
            'characteristics' => $this->characteristics
        ]);
    }
}

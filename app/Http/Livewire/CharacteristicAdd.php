<?php

namespace App\Http\Livewire;

use App\Characteristic;
use Livewire\Component;

class CharacteristicAdd extends Component
{
    // Characteristic fields
    public $name;

    // Rules for validation
    protected $rules = [
        'name' => 'required|min:3|max:25',
    ];

    /**
     * Submit the add category form
     */
    public function submit() {
        $this->validate();
        Characteristic::create([
            'name' => $this->name,
        ]);

        // Notify the parent to refresh the category listing
        $this->emitUp('insert');
    }
}

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

    // Custom messages for Validation
    protected $messages = [
        'name.min' => 'Le nombre de caractères doit être compris entre 3 et 25.',
        'required' => 'Ce champ doit être complété.',
    ];

    /**
     * Submit the add category form
     */
    public function submit() {
        $this->validate();
        Characteristic::create([
            'name' => $this->name,
        ]);

        // Refresh products
        $this->emitTo('product', 'update');

        // Notify the parent to refresh the characteristic listing
        $this->emitUp('insert');
    }
}

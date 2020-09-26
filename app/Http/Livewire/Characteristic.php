<?php

namespace App\Http\Livewire;

use App\Characteristic as CharacteristicModel;
use Livewire\Component;

class Characteristic extends Component
{
    // Characteristic model
    public $characteristic;

    // Characteristic ID provided by parent component
    public $characteristicID;

    // True to show edit characteristic form, false to hide
    public $edit;

    // Rules for validation
    protected $rules = [
        'characteristic.name' => 'required|min:3|max:25',
    ];

    // Custom messages for Validation
    protected $messages = [
        'characteristic.name.min' => 'Le nombre de caractères doit être compris entre 3 et 25.',
        'characteristic.name.required' => 'Ce champ doit être complété.',
    ];


    public function mount() {
        $this->characteristic = CharacteristicModel::find($this->characteristicID);
        $this->edit = false;
    }

    /**
     * Edit the product
     */
    public function save() {
        $this->validate();
        $this->characteristic->save();

        // Refresh products
        $this->emitTo('product', 'update');

        // Refresh component
        $this->mount();
    }
}

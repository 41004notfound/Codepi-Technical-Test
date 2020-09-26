<?php

namespace App\Http\Livewire;

use App\Characteristic as CharacteristicModel;
use Livewire\Component;

class Characteristic extends Component
{
    public $characteristic;
    public $characteristicID;
    public $edit;

    // Rules for validation
    protected $rules = [
        'characteristic.name' => 'required|min:3|max:25',
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

        // Refresh component
        $this->mount();
    }
}

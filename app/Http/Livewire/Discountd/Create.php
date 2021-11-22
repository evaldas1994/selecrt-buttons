<?php

namespace App\Http\Livewire\Discountd;

use App\Models\Discounth;
use Livewire\Component;

class Create extends Component
{
    public $f_quant;
    public $f_perc;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $discountsh;

    public function mount(Discounth $discountsh)
    {
        $this->discountsh = $discountsh;

        $this->setOldValue('f_quant', '0.0000');
        $this->setOldValue('f_perc', '0.00');
        $this->setOldValue('f_system1');
        $this->setOldValue('f_system2');
        $this->setOldValue('f_system3');
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function render()
    {
        return view('livewire.discountd.create');
    }

    private function setOldValue($value, $default = null)
    {
        if (!empty(old($value))){
            $this->$value = old($value);
        } else {
            if ($this->$value == null) {
                $this->$value = $default;
            }
        }
    }

    public function showCreate($value)
    {
        $this->emitUp('showCreate', $value);
    }
}

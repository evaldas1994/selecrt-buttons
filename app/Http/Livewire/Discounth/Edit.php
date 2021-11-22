<?php

namespace App\Http\Livewire\Discounth;

use App\Models\Discounth;
use Livewire\Component;

class Edit extends Component
{
    public $f_id = ' ';
    public $f_name;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $discountsh;


    public function mount(Discounth $discountsh)
    {
        $this->discountsh = $discountsh;
        $this->f_id = $discountsh->f_id;

        $this->setOldValue('f_id', $this->discountsh->f_id);
        $this->setOldValue('f_name', $this->discountsh->f_name);
        $this->setOldValue('f_system1', $this->discountsh->f_system1);
        $this->setOldValue('f_system2', $this->discountsh->f_system2);
        $this->setOldValue('f_system3', $this->discountsh->f_system3);
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function render()
    {
        return view('livewire.discounth.edit');
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
}

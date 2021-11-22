<?php

namespace App\Http\Livewire\Discountd;

use Livewire\Component;
use App\Models\Discounth;

class Edit extends Component
{
    public $f_quant;
    public $f_perc;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $discountsh;
    public $discountsd;

    public function mount(Discounth $discountsh, $discountsd)
    {
        $this->discountsh = $discountsh;
        $this->discountsd = $discountsd;

        $this->setOldValue('f_quant', $this->discountsd->f_quant);
        $this->setOldValue('f_perc', $this->discountsd->f_perc);
        $this->setOldValue('f_system1', $this->discountsd->f_system1);
        $this->setOldValue('f_system2', $this->discountsd->f_system2);
        $this->setOldValue('f_system3', $this->discountsd->f_system3);
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function render()
    {
        return view('livewire.discountd.edit');
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

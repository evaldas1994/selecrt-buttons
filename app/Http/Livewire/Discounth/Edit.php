<?php

namespace App\Http\Livewire\Discounth;

use Livewire\Component;
use App\Models\Discountd;
use App\Models\Discounth;

class Edit extends Component
{
    public $f_id = ' ';
    public $f_name;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $discountsh;
    public $discountsd;
    public $allDiscountsd;

    public $showCreate = false;
    public $showEdit = false;

    public function mount(Discounth $discountsh, $allDiscountsd)
    {
        $this->discountsh = $discountsh;
        $this->allDiscountsd = $allDiscountsd;
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

    public function showCreate($value = true)
    {
        $this->showCreate = $value;
        $this->showEdit = false;
    }

    public function showEdit(bool $value = true, string $id = null)
    {
        $discountsd = Discountd::find($id);

        if ($value == true && $discountsd !== null ) {
            $this->discountsd = $discountsd;
            $this->showCreate = false;
            $this->showEdit = $value;
        } else {
            $this->discountsd = null;
            $this->showCreate = false;
            $this->showEdit = false;
        }
    }

    public $listeners = [
        'showCreate' => 'showCreate',
        'showEdit' => 'showEdit'
    ];
}

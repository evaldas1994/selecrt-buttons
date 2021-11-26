<?php

namespace App\Http\Livewire\Productionh;

use Livewire\Component;

class Edit extends Component
{
    public $f_docdate;
    public $f_docno;
    public $f_blankno;
    public $f_storeid;
    public $f_groupid;
    public $f_description;
    public $f_templateid1;
    public $f_groupid1;
    public $f_templateid2;
    public $f_groupid2;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $productionsh;
    public $stores;
    public $templates;
    public $productionGroups;
    public $stockOperationGroups;

    public function mount($productionsh, $stores, $templates, $productionGroups, $stockOperationGroups)
    {
        $this->productionsh = $productionsh;
        $this->stores = $stores;
        $this->templates = $templates;
        $this->productionGroups = $productionGroups;
        $this->stockOperationGroups = $stockOperationGroups;

        $this->setOldValue('f_docdate', $productionsh->f_docdate);
        $this->setOldValue('f_docno', $productionsh->f_docno);
        $this->setOldValue('f_blankno', $productionsh->f_blankno);
        $this->setOldValue('f_storeid', $productionsh->f_storeid);
        $this->setOldValue('f_groupid', $productionsh->f_groupid);
        $this->setOldValue('f_description', $productionsh->f_description);
        $this->setOldValue('f_templateid1', $productionsh->f_templateid1);
        $this->setOldValue('f_groupid1', $productionsh->f_groupid1);
        $this->setOldValue('f_templateid2', $productionsh->f_templateid2);
        $this->setOldValue('f_groupid2', $productionsh->f_groupid2);
        $this->setOldValue('f_system1', $productionsh->f_system1);
        $this->setOldValue('f_system2', $productionsh->f_system2);
        $this->setOldValue('f_system3', $productionsh->f_system3);
    }

    public function changeStore($id)
    {
        $this->setOldValue('f_storeid', $id);
    }

    public function changeProductionGroup($id)
    {
        $this->setOldValue('f_groupid', $id);
    }

    public function changeTemplate1($id)
    {
        $this->setOldValue('f_templateid1', $id);
    }

    public function changeStockOperationGroup1($id)
    {
        $this->setOldValue('f_groupid1', $id);
    }

    public function changeTemplate2($id)
    {
        $this->setOldValue('f_templateid2', $id);
    }

    public function changeStockOperationGroup2($id)
    {
        $this->setOldValue('f_groupid2', $id);
    }

    public function render()
    {
        return view('livewire.productionh.edit');
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

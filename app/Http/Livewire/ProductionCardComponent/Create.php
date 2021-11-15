<?php

namespace App\Http\Livewire\ProductionCardComponent;

use App\Models\Stock;
use Livewire\Component;

class Create extends Component
{
    public $f_id;
    public $f_stockid;
    public $f_stock_name;
    public $f_quant;
    public $f_unitid;
    public $f_alter_stockid;
    public $f_alter_stock_name;
    public $f_price;
    public $f_type;
    public $f_neto;

    public $productionCard;
    public $stocks;
    public $types;

    public $f_type_locked = false;

    public function mount($productionCard, $stocks, $types)
    {
        $this->productionCard = $productionCard;
        $this->stocks = $stocks;
        $this->types = $types;

        $this->setOldValue('f_type');
        $this->setOldValue('f_id');
        $this->setOldValue('f_stockid');
        $this->setOldValue('f_stock_name');
        $this->setOldValue('f_quant', '1.0000');
        $this->setOldValue('f_unitid');
        $this->setOldValue('f_alter_stockid');
        $this->setOldValue('f_alter_stock_name');
        $this->setOldValue('f_neto', '0.0000');
        ($this->f_type == 1 || $this->f_type == null) ? $this->f_price = '0.0000' : $this->setOldValue('f_price', '0.0000',);

        $this->f_stockid != null ? $this->f_type_locked = true : $this->f_type_locked = false;
    }

    public function changeStock($stockid)
    {
        if ($stockid != null ) {
            $stock = Stock::findOrFail($stockid);

            $this->f_stockid = $stock->f_id;
            $this->f_stock_name = $stock->f_name;
            $this->f_unitid = $stock->f_unitid;
            $this->f_type = $stock->f_type;

            $this->f_type == 1 ? $this->f_price = '0.0000' : '';
            $this->f_type = $stock->f_type;
            $this->f_type_locked = true;
        } else {
            $this->f_stockid = null;
            $this->f_stock_name = null;
            $this->f_unitid = null;
            $this->f_type = 1;
            $this->f_type_locked = false;
        }
    }

    public function changeType($type)
    {
        if ($this->f_stockid == null) {
            $this->f_type = $type;
            $type == 1 ? $this->f_price = '0.0000' : '';
        }
    }

    public function changeAlterStock($alterStockid)
    {
        $alterStock = Stock::findOrFail($alterStockid);

        $this->f_alter_stockid = $alterStock->f_id;
        $this->f_alter_stock_name = $alterStock->f_name;
    }

    public function render()
    {
        return view('livewire.productionCardComponent.create');
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

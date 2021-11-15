<?php

namespace App\Http\Livewire\ProductionCard;

use App\Models\Stock;
use Livewire\Component;
use Livewire\WithFileUploads;

use function PHPUnit\Framework\isEmpty;

class Edit extends Component
{
    use WithFileUploads;

    public $f_id;
    public $f_stockid;
    public $f_stock_name;
    public $f_name;
    public $f_name2;
    public $f_quant;
    public $f_unitid;
    public $f_description;

    public $productionCard;
    public $stocks;
    public $productionCardComponents;

    public function mount($stocks, $productionCard, $productionCardComponents)
    {
        $this->productionCard = $productionCard;
        $this->stocks = $stocks;
        $this->productionCardComponents = $productionCardComponents;

        $this->f_id = $productionCard->f_id;
        $this->f_stockid = $productionCard->f_stockid;
        $this->f_stock_name = $productionCard->f_stock_name;
        $this->f_name = $productionCard->f_name;
        $this->f_name2 = $productionCard->f_name2;
        $this->f_quant = $productionCard->f_quant;
        $this->f_unitid = $productionCard->f_unitid;
        $this->f_description = $productionCard->f_description;

        $this->setOldValue('f_id',);
        $this->setOldValue('f_stockid',);
        $this->setOldValue('f_stock_name',);
        $this->setOldValue('f_name',);
        $this->setOldValue('f_name2',);
        $this->setOldValue('f_quant', '1.0000');
        $this->setOldValue('f_unitid',);
        $this->setOldValue('f_description',);

        $this->f_stockid !== null ? $this->changeStock($this->f_stockid) : '';
    }

    public function changeStock(string $stockId)
    {
        if ($stockId == null) {
            $this->f_stock_name = null;
            $this->f_unitid = null;
        } else {
            $stock = Stock::findOrFail($stockId);

            $this->f_stock_name = $stock->f_name;
            $this->f_unitid = $stock->f_unitid;
        }
    }

    public function render()
    {
        return view('livewire.productionCard.edit');
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

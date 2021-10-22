<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class BlankNumber extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_blankno';

    protected $perPage = 500;

    public static $opTypes = [
        ['value' => 'P', 'name' => 'P - pajamavimas'],
        ['value' => 'N', 'name' => 'N - nurašymas'],
        ['value' => 'E', 'name' => 'E - perkėlimas'],
        ['value' => 'Y', 'name' => 'Y - gamyba'],
        ['value' => 'T', 'name' => 'T - inventorizacija'],
        ['value' => 'A', 'name' => 'A - pardavimas'],
        ['value' => 'I', 'name' => 'I - pirkimas'],
        ['value' => 'R', 'name' => 'R - pardavimo grąžinimas'],
        ['value' => 'Z', 'name' => 'Z - pirkimo grąžinimas'],
        ['value' => 'L', 'name' => 'L - logistika'],
    ];

    public static $invoiceRegisterTypes = [
        ['value' => '1', 'name' => '1 - neparinkti'],
        ['value' => '0', 'name' => '0 - neregistruoti'],
        ['value' => '2', 'name' => '2 - išrašomų'],
        ['value' => '3', 'name' => '3 - gaunamų'],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_counterid',
        'f_op',
        'f_storeid',
        'f_groupid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_invoice_register',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'f_id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'f_create_date';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'f_modified_date';

    /**
     * Get the blank number's counter.
     */
    public function counter()
    {
        return $this->hasOne(Counter::class, 'f_id', 'f_counterid');
    }

    /**
     * Get the blank number's store.
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid');
    }

    /**
     * Get the blank number's stock operation group.
     */
    public function stockOperationGroup()
    {
        return $this->hasOne(StockOperationGroup::class, 'f_id', 'f_groupid');
    }
}

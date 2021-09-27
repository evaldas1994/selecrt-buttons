<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-08-30
 */

namespace App\Repositories;

use App\Models\Vat;
use App\Repositories\Interfaces\VatRepositoryInterface;

class VatRepository extends BaseRepository implements VatRepositoryInterface
{
    /**
     * @param Vat $model
     */
    public function __construct(Vat $model)
    {
        parent::__construct($model);
    }

}

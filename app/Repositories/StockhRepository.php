<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-17
 */

namespace App\Repositories;

use App\Models\Stockh;
use App\Repositories\Interfaces\StockhRepositoryInterface;

class StockhRepository extends BaseRepository implements StockhRepositoryInterface
{
    /**
     * @param Stockh $model
     */
    public function __construct(Stockh $model)
    {
        parent::__construct($model);
    }
}

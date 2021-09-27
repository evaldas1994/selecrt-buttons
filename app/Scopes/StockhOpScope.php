<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-17
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StockhOpScope implements Scope
{
    protected $op;

    public function __construct($op)
    {
        $this->op = $op;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('f_op', '=', $this->op);
    }
}

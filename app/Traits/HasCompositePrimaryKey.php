<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2022-01-03
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasCompositePrimaryKey
{


    /**
     * @return false
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    protected function setKeysForSaveQuery($query): mixed
    {
        foreach ($this->getKeyName() as $key) {
            if (isset($this->$key)) {
                $query->where($key, '=', $this->$key);
            } else {
                throw new Exception(__METHOD__ . 'Missing part of the primary key: ' . $key);
            }
        }
        return $query;
    }


    /**
     * @param null $keyName
     *
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null): mixed
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

    /**
     * @param $ids
     * @param string[] $columns
     *
     * @return Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function find($ids, $columns = ['*']): mixed
    {
        $me = new self;
        $query = $me->newQuery();

        foreach ($me->getKeyName() as $key) {
            $query->where($key, '=', $ids[$key]);
        }

        return $query->first($columns);
    }
}

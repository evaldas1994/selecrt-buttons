<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-08-30
 */

namespace App\Repositories;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array|string[] $columns
     * @param array $relations
     *
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * @param int|string $modelId
     * @param array|string[] $columns
     * @param array $relations
     * @param array $appends
     *
     * @return Model|null
     */
    public function findById(
        int|string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * @param array $payloads
     *
     * @return Model|null
     */
    public function create(array $payloads): ?Model
    {
        $model = $this->model->create($payloads);

        return $model->refresh();
    }

    /**
     * @param int $modelId
     * @param array $payload
     *
     * @return bool
     */
    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    /**
     * @param int|string $modelId
     *
     * @return bool
     */
    public function destroy(int|string $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }
}

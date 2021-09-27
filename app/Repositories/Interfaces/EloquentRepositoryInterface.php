<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-08-30
 */

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    /**
     * @param array|string[] $columns
     * @param array $relations
     *
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * @param int|string $modelId
     * @param array|string[] $columns
     * @param array $relations
     * @param array $appends
     *
     * @return Model|null
     */
    public function findById(int|string $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Model;

    /**
     * @param array $payloads
     *
     * @return Model|null
     */
    public function create(array $payloads): ?Model;

    /**
     * @param int $modelId
     * @param array $payload
     *
     * @return bool
     */
    public function update(int $modelId, array $payload): bool;

    /**
     * @param int|string $modelId
     *
     * @return bool
     */
    public function destroy(int|string $modelId): bool;
}

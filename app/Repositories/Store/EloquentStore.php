<?php

namespace App\Repositories\Store;

use App\Models\Store;

class EloquentStore implements StoreRepository
{
    /**
     * @var \App\Models\Store
     */
    private $model;

    /**
     * EloquentStore constructor.
     *
     * @param \App\Models\Store $store
     */
    public function __construct(Store $store)
    {
        $this->model = $store;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findById($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $store = $this->model->findOrFail($id);
        $store->update($attributes);

        return $store;
    }

    public function delete($id)
    {
        $store = $this->model->findOrFail($id);
        $store->delete();

        return true;
    }
}
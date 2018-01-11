<?php

namespace Rits\Ace\Repositories;

use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Rits\Ace\Concerns\HasModel;
use Rits\Ace\Support\Eloquent\Model;

class BackendRepository
{
    use HasModel;

    /**
     * BackendRepository constructor.
     *
     * @param string $resourceType
     */
    public function __construct($resourceType = null)
    {
        $this->resourceType = $resourceType;
    }

    /**
     * Display a listing of the resource.
     *
     * @param array $search
     * @param array $order
     * @return Collection|Model[]
     */
    public function index($search, $order)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->newQuery()
            ->select($this->indexColumns())
            ->filter([$this, 'indexFilter'])
            ->search($search)
            ->order($order)
            ->paginate()
            ->appends(['q' => $search, 'order' => $order]);
    }

    /**
     * Columns to optimize index query.
     *
     * @return string|array
     */
    public function indexColumns()
    {
        return '*';
    }

    /**
     * Filter to optimize index query.
     *
     * @param Builder $query
     * @return Builder
     */
    public function indexFilter($query)
    {
        return $query;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Model
     */
    public function create($attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $attributes = $this->createAttributes($attributes);

            /** @var Model $resource */
            $resource = $this->build($attributes, true);
            $resource->save();

            return $this->storeHook($resource);
        });
    }

    /**
     * Handles create action attributes.
     *
     * @param array $attributes
     * @return array
     */
    public function createAttributes($attributes)
    {
        return $attributes;
    }

    /**
     * Handles model after store.
     *
     * @param Model $resource
     * @return Model
     */
    public function storeHook($resource)
    {
        return $resource;
    }
}

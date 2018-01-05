<?php

namespace Rits\Ace\Repositories;

use Illuminate\Support\Collection;
use Rits\Ace\Concerns\HasModel;
use Rits\Ace\Eloquent\Model;

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
            ->appends(['q' => $search]);
    }
}

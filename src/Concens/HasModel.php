<?php

namespace Rits\Ace\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rits\Ace\Repositories\BackendRepository;

trait HasModel
{
    /**
     * Type of the resource to manage.
     *
     * @var string
     */
    protected $resourceType;

    /**
     * Eloquent instance for helper methods.
     *
     * @var Model
     */
    protected $resourceInstance;

    /**
     * Get resource instance.
     *
     * @return Model
     */
    protected function getInstance()
    {
        if (is_null($this->resourceInstance)) {
            $this->resourceInstance = new $this->resourceType;
        }

        return $this->resourceInstance;
    }

    /**
     * Get table name for resource type.
     *
     * @return string
     */
    protected function getTable()
    {
        return $this->getInstance()->getTable();
    }

    /**
     * Get repository instance for resource.
     *
     * @return BackendRepository
     */
    protected function getRepository()
    {
        return new BackendRepository($this->resourceType);
    }

    /**
     * Create a new query for the resource.
     *
     * @return Builder
     */
    protected function newQuery()
    {
        return $this->getInstance()->newQuery();
    }
}
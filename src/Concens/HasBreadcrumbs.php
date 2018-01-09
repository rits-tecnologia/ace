<?php

namespace Rits\Ace\Concerns;

use Rits\Ace\Support\Eloquent\Model;

trait HasBreadcrumbs
{
    /**
     * Add a new crumb to the breadcrumbs.
     *
     * @param Model $resource
     * @param string $action
     * @param array $parameters
     * @return void
     */
    protected function addBreadcrumb($resource, $action, $parameters = [])
    {
        app('breadcrumbs')
            ->addNewCrumb(
                $resource->trans($action),
                $resource->route($action, $parameters)
            );
    }
}

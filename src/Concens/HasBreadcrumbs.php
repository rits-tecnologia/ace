<?php

namespace Rits\Ace\Concerns;

trait HasBreadcrumbs
{
    /**
     * Add a new crumb to the breadcrumbs.
     *
     * @param string $action
     * @param array $parameters
     * @return void
     */
    protected function addBreadcrumb($action, $parameters = [])
    {
        app('breadcrumbs')
            ->addNewCrumb(
                $this->trans($action),
                $this->route($action, $parameters)
            );
    }
}

<?php

namespace Rits\Ace\Concerns;

use Breadcrumbs;

trait LeavesCrumbs
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
        Breadcrumbs::addCrumb(
            $this->trans($action),
            $this->route($action, $parameters)
        );
    }
}

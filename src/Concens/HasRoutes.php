<?php

namespace Rits\Ace\Concerns;

use Illuminate\View\View;

trait HasRoutes
{
    /**
     * Get route by action.
     *
     * @param string $action
     * @param array $parameters
     * @return string
     */
    public function route($action, $parameters = [])
    {
        $defaultRoute = 'web.' . $this->getTable() . '.%s';

        return route(sprintf($defaultRoute, $action), $parameters);
    }

    /**
     * Get view by action.
     *
     * @param string $action
     * @return View
     */
    public function view($action)
    {
        $defaultView = 'web.' . $this->getTable() . '%s';

        return view(sprintf($defaultView, $action));
    }
}

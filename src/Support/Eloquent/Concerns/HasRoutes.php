<?php

namespace Rits\Ace\Support\Eloquent\Concerns;

use Illuminate\Routing\RouteCollection;

trait HasRoutes
{
    /**
     * Default format for the resource routes. The
     * following replacements are made:
     *
     *  1. {action}: the current controller action;
     *  2. {table}: the resource table name
     *
     * @var string
     */
    protected $routeFormat = 'web.{table}.{action}';

    /**
     * Get route by action.
     *
     * @param string $action
     * @param array $parameters
     * @return string
     */
    public function route($action, $parameters = [])
    {
        $name = str_replace(
            ['{action}', '{table}'],
            [$action, $this->getTable()],
            $this->routeFormat
        );

        /** @var RouteCollection $routes */
        $routes = app('router')->getRoutes();

        if ($route = $routes->getByName($name)) {
            if (array_search($this->getRouteKeyName(), $route->parameterNames()) !== false) {
                $parameters[$this->getRouteKeyName()] = $this->getRouteKey();
            }
        }

        return route($name, $parameters);
    }
}

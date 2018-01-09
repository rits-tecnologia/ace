<?php

namespace Rits\Ace\Concerns;

use Illuminate\View\View;

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
     * Default format for the views path. The following
     * replacements are made:
     *
     *  1. {action}: the current controller action;
     *  2. {table}: the resource table name
     *
     * @var string
     */
    protected $viewFormat = '{table}.{action}';

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

        return route($name, $parameters);
    }

    /**
     * Get view by action.
     *
     * @param string $action
     * @return View
     */
    public function view($action)
    {
        $name = str_replace(
            ['{action}', '{table}'],
            [$action, $this->getTable()],
            $this->viewFormat
        );

        return view($name);
    }
}

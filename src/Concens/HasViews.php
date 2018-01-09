<?php

namespace Rits\Ace\Concerns;

use Illuminate\View\View;

trait HasViews
{
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

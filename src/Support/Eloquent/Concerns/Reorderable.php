<?php

namespace Rits\Ace\Support\Eloquent\Concerns;

use Illuminate\Database\Query\Builder;

trait Reorderable
{
    /**
     * List of headers for the admin reordering table.
     *
     * @return array
     */
    public function adminReorderColumns($query, $order)
    {
        return $this->adminColumns();
    }
}

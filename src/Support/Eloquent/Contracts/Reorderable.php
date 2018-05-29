<?php

namespace Rits\Ace\Support\Eloquent\Contracts;

interface Reorderable
{
    /**
     * List of headers for the admin reordering table.
     *
     * @return array
     */
    public function adminReorderColumns();
}

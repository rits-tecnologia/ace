<?php

namespace Rits\Ace\Support\Eloquent\Contracts;

interface TableContract
{
    /**
     * List of headers for the admin listing table.
     *
     * @return array
     */
    public static function adminColumns();
}

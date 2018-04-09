<?php

namespace Rits\Ace\Support\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Rits\Ace\Concerns\HasTranslations;
use Rits\Ace\Support\Eloquent\Concerns\Filterable;
use Rits\Ace\Support\Eloquent\Concerns\HasDateColumns;
use Rits\Ace\Support\Eloquent\Concerns\HasRoutes;
use Rits\Ace\Support\Eloquent\Concerns\Orderable;
use Rits\Ace\Support\Eloquent\Concerns\Searchable;
use Rits\Ace\Support\Eloquent\Contracts\TableContract;

abstract class Model extends Eloquent implements TableContract
{
    use Filterable,
        HasDateColumns,
        HasRoutes,
        HasTranslations,
        Orderable,
        Searchable;
}

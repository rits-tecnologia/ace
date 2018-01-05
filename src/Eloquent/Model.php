<?php

namespace Rits\Ace\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Rits\Ace\Eloquent\Concerns\Filterable;
use Rits\Ace\Eloquent\Concerns\Orderable;
use Rits\Ace\Eloquent\Concerns\Searchable;

class Model extends Eloquent
{
    use Filterable, Orderable, Searchable;
}

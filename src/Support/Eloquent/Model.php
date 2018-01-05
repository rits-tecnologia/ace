<?php

namespace Rits\Ace\Support\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Rits\Ace\Support\Eloquent\Concerns\Filterable;
use Rits\Ace\Support\Eloquent\Concerns\Orderable;
use Rits\Ace\Support\Eloquent\Concerns\Searchable;

class Model extends Eloquent
{
    use Filterable, Orderable, Searchable;
}

<?php

namespace Rits\Ace\Support\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Rits\Ace\Concerns\HasRoutes;
use Rits\Ace\Concerns\HasTranslations;
use Rits\Ace\Support\Eloquent\Concerns\Filterable;
use Rits\Ace\Support\Eloquent\Concerns\Orderable;
use Rits\Ace\Support\Eloquent\Concerns\Searchable;
use Rits\Ace\Support\Eloquent\Contracts\TableContract;

abstract class Model extends Eloquent implements TableContract
{
    use Filterable,
        HasRoutes,
        HasTranslations,
        Orderable,
        Searchable;

    /**
     * Convert date to localized format.
     *
     * @param string $attribute
     * @return string
     */
    public function getDateColumn($attribute)
    {
        $value = $this->{$attribute};

        if (is_null($value)) {
            return '';
        }

        if (is_string($value)) {
            $value = $this->asDateTime($value);
        }

        return $value->formatLocalized(config('ace.app.date_format'));
    }

    /**
     * Value for an admin column.
     *
     * @param string $attribute
     * @return string
     */
    public function getColumn($attribute)
    {
        $method = 'get-' . $attribute . '-column';

        if (method_exists($this, $method)) {
            return $this->{$method}();
        } elseif ($this->isDateAttribute($attribute)) {
            return $this->getDateColumn($attribute);
        }

        return $this->$attribute;
    }
}

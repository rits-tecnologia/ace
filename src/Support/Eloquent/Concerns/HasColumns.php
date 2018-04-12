<?php

namespace Rits\Ace\Support\Eloquent\Concerns;

trait HasColumns
{
    /**
     * Convert date to localized format.
     *
     * @param string $attribute
     * @return string
     */
    public function getDateAdminColumn($attribute)
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
    public function getAdminColumn($attribute)
    {
        $method = camel_case('get-' . $attribute . '-admin-column');

        if (method_exists($this, $method)) {
            return $this->{$method}();
        } elseif ($this->isDateAttribute($attribute)) {
            return $this->getDateAdminColumn($attribute);
        }

        return $this->$attribute;
    }
}
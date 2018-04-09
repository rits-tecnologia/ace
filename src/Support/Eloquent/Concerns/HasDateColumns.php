<?php

namespace Rits\Ace\Support\Eloquent\Concerns;

trait HasDateColumns
{
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

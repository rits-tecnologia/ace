<?php

namespace Rits\Ace\Concerns;

trait HasTranslations
{
    /**
     * Get translations strings.
     *
     * @return array
     */
    protected function getTranslations()
    {
        return [
            'index' => 'Resources',
        ];
    }

    /**
     * Get translation by key.
     *
     * @param string $key
     * @return string
     */
    protected function trans($key)
    {
        return data_get($this->getTranslations(), $key);
    }
}

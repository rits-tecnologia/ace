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
            'index' => __t('ace::terms.actions.' . $this->resourceType . '.index', 'ace::terms.actions.resource.index'),
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

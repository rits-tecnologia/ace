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
            'index' => __t('ace::terms.actions.' . get_class($this) . '.index', 'ace::terms.actions.resource.index'),
            'new' => __t('ace::terms.actions.' . get_class($this) . '.new', 'ace::terms.actions.resource.new'),
        ];
    }

    /**
     * Get translation by key.
     *
     * @param string $key
     * @return string
     */
    public function trans($key)
    {
        return data_get($this->getTranslations(), $key);
    }
}

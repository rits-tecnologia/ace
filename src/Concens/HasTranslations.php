<?php

namespace Rits\Ace\Concerns;

trait HasTranslations
{
    /**
     * Get translation by key.
     *
     * @param string $key
     * @return string
     */
    public function trans($key)
    {
        return __t(
            'ace::terms.actions.' . get_class($this) . '.' . $key,
            'ace::terms.actions.resource.' . $key
        );
    }
}

<?php

if (! function_exists(__NAMESPACE__.'\\globals')) {
    /**
     * Alias to the registry function.
     *
     * @param string|null $key
     * @param mixed|null $default
     * @return mixed
     */
    function globals($key = null, $default = null)
    {
        return registry($key, $default);
    }
}

if (! function_exists(__NAMESPACE__.'\\registry')) {
    /**
     * Handles global variables in a controlled namespace.
     *
     * @param string|null $key
     * @param mixed|null  $default
     * @return mixed
     */
    function registry($key = null, $default = null)
    {
        if (is_string($key)) {
            $key = 'registry.'.$key;
        } elseif (is_array($key)) {
            foreach ($key as $index => $value) {
                $key['registry.'.$index] = $value;
                unset($key[$index]);
            }
        } elseif (is_null($key)) {
            $key = 'registry';
        }
        return config($key, $default);
    }
}

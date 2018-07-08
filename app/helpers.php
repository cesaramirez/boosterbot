<?php

/**
 * Set active class to navigation.
 *
 * @param string $path
 * @param string $class
 */
function isActive($path, $class = 'is-active')
{
    if (request()->is($path)) {
        return $class;
    }

    return '';
}

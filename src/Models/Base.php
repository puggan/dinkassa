<?php
declare(strict_types=1);

namespace Dinkassa\Models;

abstract class Base
{
    /**
     * Base constructor.
     * @param array|object|null $attributes properties to set
     */
    public function __construct($attributes = null)
    {
        // allow object, convert to array
        if (is_object($attributes)) {
            $attributes = get_object_vars($attributes);
        }

        // Do nothing if we didn't get an array
        if (is_array($attributes)) {
            foreach(array_keys(get_object_vars($this)) as $fieldName) {
                if (!isset($attributes[$fieldName])) {
                    continue;
                }
                if (is_object($attributes[$fieldName])) {
                    $this->$fieldName = clone $attributes[$fieldName];
                } else {
                    $this->$fieldName = $attributes[$fieldName];
                }
            }
        }
    }
}
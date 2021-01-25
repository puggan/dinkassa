<?php


namespace Dinkassa\Exceptions;

/**
 * Class EntityMissing
 * @package Dinkassa\Exceptions
 */
class EntityMissing extends \RuntimeException
{
    /**
     * @param \Exception $exception
     * @return EntityMissing
     */
    public static function fromException(\Exception $exception): EntityMissing
    {
        return new self($exception->getMessage(), $exception->getCode(), $exception);
    }
}
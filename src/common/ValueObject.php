<?php


namespace services\valueobjects\common;


abstract class ValueObject implements \services\valueobjects\common\contracts\ValueObject
{

    public function equals(\services\valueobjects\common\contracts\ValueObject $other): bool
    {
        if (get_class($this) !== get_class($other)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'A Value Object of type %s can not be compared to another of type %s',
                    get_class($this),
                    get_class($other)
                )
            );
        }

        return $this == $other;
    }
}
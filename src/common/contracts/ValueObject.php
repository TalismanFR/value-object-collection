<?php


namespace services\valueobjects\common\contracts;


interface ValueObject extends \JsonSerializable
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool;
}
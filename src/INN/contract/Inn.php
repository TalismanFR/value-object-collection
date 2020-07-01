<?php


namespace services\valueobjects\INN\contract;


use services\valueobjects\common\contracts\ValueObject;

interface Inn extends ValueObject
{
    /**
     * @return string
     */
    public function getInn(): string;
}
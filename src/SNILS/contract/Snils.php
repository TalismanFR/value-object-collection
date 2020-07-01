<?php


namespace services\valueobjects\SNILS\contract;


use services\valueobjects\common\contracts\ValueObject;

interface Snils extends ValueObject
{
    /**
     * @return string
     */
    public function getSnils(): string;
}
<?php


namespace services\valueobjects\OGRNIP\contract;


use services\valueobjects\common\contracts\ValueObject;

interface Ogrnip extends ValueObject
{
    /**
     * @return string
     */
    public function getOgrnip(): string;
}
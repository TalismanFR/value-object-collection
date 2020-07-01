<?php


namespace services\valueobjects\OGRN\contract;


use services\valueobjects\common\contracts\ValueObject;

interface Ogrn extends ValueObject
{
    /**
     * @return string
     */
    public function getOgrn(): string;
}
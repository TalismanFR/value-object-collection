<?php


namespace services\valueobjects\Phone\contract;


use services\valueobjects\common\contracts\ValueObject;

interface PhoneNumber extends ValueObject
{
    /**
     * @return string
     */
    public function getPhoneNumber(): string;
}
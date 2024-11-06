<?php


namespace services\valueobjects\Phone\contract;


use services\valueobjects\common\contracts\ValueObject;

interface PhoneNumber extends ValueObject
{
    /**
     * @return string
     */
    public function getPhoneNumber(): string;

    /**
     * +79505555555
     *
     * @return string
     */
    public function getE164PhoneNumber(): string;

    /**
     * 79505555555
     *
     * @return string
     */
    public function getE64WithoutPlus(): string;

    /**
     * 89505555555
     *
     * @return string
     */
    public function getNationalWithoutSymbols(): string;
}
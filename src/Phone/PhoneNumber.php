<?php


namespace services\valueobjects\Phone;


use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;
use services\valueobjects\common\ValueObject;

class PhoneNumber extends ValueObject implements \services\valueobjects\Phone\contract\PhoneNumber
{
    private string $phone;

    /**
     * PhoneNumber constructor.
     * @param string $phone
     */
    public function __construct(string $phone)
    {
        if (!$this->validPhoneNumber($phone)) {
            throw new \InvalidArgumentException('Phone Number is not valid');
        }
        $this->phone = $phone;
    }

    private function validPhoneNumber(string $phoneNumber): bool
    {
        try {
            $number = PhoneNumberUtil::getInstance()->parse($phoneNumber);
            if (!PhoneNumberUtil::getInstance()->isPossibleNumber($number)) {
                throw new NumberParseException(NumberParseException::NOT_A_NUMBER, 'Error format phone ' . $phoneNumber);
            }
        } catch (NumberParseException $e) {
            return false;
        }

        return true;

    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone;
    }


    public function __toString()
    {
        return $this->getPhoneNumber();
    }
}
<?php


namespace services\valueobjects\Phone;


use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use services\valueobjects\common\ValueObject;

class PhoneNumber extends ValueObject implements \services\valueobjects\Phone\contract\PhoneNumber
{
    private string $phone;
    private ?string $format;

    private ?\libphonenumber\PhoneNumber $phoneNumber;
    private PhoneNumberUtil $phoneUtil;

    private const DEFAULT_REGION = 'RU';

    public const FORMAT_E164 = 'E164';
    public const FORMAT_E164_WITHOUT_PLUS = 'E164_WITHOUT_PLUS';
    public const FORMAT_INTERNATIONAL = 'INTERNATIONAL';
    public const FORMAT_NATIONAL_WITHOUT_SYMBOLS = 'NATIONAL_WITHOUT_SYMBOLS';


    /**
     * PhoneNumber constructor.
     * @param string $phone
     */
    public function __construct(string $phone, string $defaultRegion = self::DEFAULT_REGION, ?string $format = null)
    {
        $this->phoneUtil = PhoneNumberUtil::getInstance();
        if (!$this->validPhoneNumber($phone, $defaultRegion)) {
            throw new \InvalidArgumentException('Phone Number is not valid');
        }
        $this->phone = $phone;
        $this->format = $format;
    }

    private function validPhoneNumber(string $phoneNumber, string $defaultRegion): bool
    {
        try {
            $this->phoneNumber = $this->phoneUtil->parse($phoneNumber, $defaultRegion);
            if (!$this->phoneUtil->isPossibleNumber($this->phoneNumber)) {
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
        return match ($this->format) {
            self::FORMAT_E164 => $this->getE164PhoneNumber(),
            self::FORMAT_E164_WITHOUT_PLUS => $this->getE64WithoutPlus(),
            self::FORMAT_INTERNATIONAL => $this->getInternational(),
            self::FORMAT_NATIONAL_WITHOUT_SYMBOLS => $this->getNationalWithoutSymbols(),
            default => $this->phone
        };
    }


    public function __toString(): string
    {
        return $this->getPhoneNumber();
    }

    public function getE164PhoneNumber(): string
    {
        return $this->phoneUtil->format($this->phoneNumber, PhoneNumberFormat::E164);
    }

    public function getE64WithoutPlus(): string
    {
        $result = $this->phoneUtil->format($this->phoneNumber, PhoneNumberFormat::E164);
        return preg_replace('/[^0-9]+/', '', $result);
    }

    public function getNationalWithoutSymbols(): string
    {
        $result = $this->phoneUtil->format($this->phoneNumber, PhoneNumberFormat::NATIONAL);
        return preg_replace('/[^0-9]+/', '', $result);
    }

    public function getInternational(): string
    {
        return $this->phoneUtil->format($this->phoneNumber, PhoneNumberFormat::INTERNATIONAL);
    }
}
<?php


namespace services\valueobjects\SNILS;


use services\valueobjects\common\ValueObject;

class Snils extends ValueObject implements \services\valueobjects\SNILS\contract\Snils
{
    private string $snils;

    /**
     * Snils constructor.
     * @param string $snils
     */
    public function __construct(string $snils)
    {
        if (!$this->validateSnils($snils)) {
            throw new \InvalidArgumentException('SNILS is not valid');
        }
        $this->snils = $snils;
    }

    /**
     * @param string $snils
     * @return boolean
     */
    private function validateSnils(string $snils): bool
    {
        if (preg_match('/[^0-9]/', $snils) || strlen($snils) !== 11) {
            return false; //'СНИЛС может состоять только из 11 цифр';
        }
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (int)$snils[$i] * (9 - $i);
        }
        $check_digit = 0;
        if ($sum < 100) {
            $check_digit = $sum;
        } elseif ($sum > 101) {
            $check_digit = $sum % 101;
            if ($check_digit === 100) {
                $check_digit = 0;
            }
        }
        //проверка контрольной суммы
        return $check_digit === (int)substr($snils, -2);
    }

    /**
     * @return string
     */
    public function getSnils(): string
    {
        return $this->snils;
    }


    public function __toString(): string
    {
        return $this->getSnils();
    }

    public function jsonSerialize(): string
    {
        return $this->__toString();
    }

}
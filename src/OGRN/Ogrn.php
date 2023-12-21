<?php


namespace services\valueobjects\OGRN;


use services\valueobjects\common\ValueObject;

class Ogrn extends ValueObject implements \services\valueobjects\OGRN\contract\Ogrn
{
    private string $ogrn;

    /**
     * Ogrn constructor.
     * @param string $ogrn
     */
    public function __construct(string $ogrn)
    {
        if (!$this->validateOgrn($ogrn)) {
            throw new \InvalidArgumentException('OGRN is not valid');
        }
        $this->ogrn = $ogrn;
    }

    /**
     * @param string $ogrn
     * @return bool
     */
    private function validateOgrn(string $ogrn): bool
    {
        if (preg_match('/[^0-9]/', $ogrn) || strlen($ogrn) !== 13) {
            return false;
        }

        $n13 = (int)substr(bcsub(substr($ogrn, 0, -1), bcmul(bcdiv(substr($ogrn, 0, -1), '11', 0), '11')), -1);

        return $n13 === (int)$ogrn[12];
    }

    /**
     * @return string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }


    public function __toString(): string
    {
        return $this->getOgrn();
    }

    public function jsonSerialize(): string
    {
        return $this->__toString();
    }

}
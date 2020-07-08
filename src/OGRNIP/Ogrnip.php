<?php


namespace services\valueobjects\OGRNIP;


use services\valueobjects\common\ValueObject;

class Ogrnip extends ValueObject implements \services\valueobjects\OGRNIP\contract\Ogrnip
{
    private string $ogrnip;

    /**
     * Ogrnip constructor.
     * @param string $ogrnip
     */
    public function __construct(string $ogrnip)
    {
        if (!$this->validateOgrnip($ogrnip)) {
            throw new \InvalidArgumentException('OGRNIP is not valid');
        }
        $this->ogrnip = $ogrnip;
    }

    private function validateOgrnip(string $ogrnip): bool
    {

        if (preg_match('/[^0-9]/', $ogrnip) || strlen($ogrnip) !== 15) {
            return false;
        }

        $n15 = (int)substr(bcsub(substr($ogrnip, 0, -1), bcmul(bcdiv(substr($ogrnip, 0, -1), '13', 0), '13')), -1);
        return $n15 === (int)$ogrnip[14];
    }

    /**
     * @return string
     */
    public function getOgrnip(): string
    {
        return $this->ogrnip;
    }

    public function __toString()
    {
        return $this->getOgrnip();
    }

    public function jsonSerialize()
    {
        return $this->__toString();
    }

}
<?php

namespace OGRN;

use PHPUnit\Framework\TestCase;
use services\valueobjects\common\contracts\ValueObject;
use services\valueobjects\OGRN\Ogrn;

class OgrnTest extends TestCase
{

    public function test__construct()
    {
        $ogrn = new Ogrn('1027700092661');
        self::assertInstanceOf(ValueObject::class, $ogrn);
        return $ogrn;
    }

    public function testConstructBad()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Ogrn('2027700092661');
    }

    /**
     * @depends test__construct
     * @param Ogrn $ogrn
     */
    public function testGetOgrn(Ogrn $ogrn)
    {
        self::assertEquals('1027700092661', $ogrn->getOgrn());
    }

    /**
     * @depends test__construct
     * @param Ogrn $ogrn
     */
    public function test__toString(Ogrn $ogrn)
    {
        self::assertEquals('1027700092661', $ogrn->__toString());
    }

    /**
     * @depends test__construct
     * @param Ogrn $ogrn
     */
    public function testJsonSerialize(Ogrn $ogrn)
    {
        self::assertEquals('1027700092661', $ogrn->jsonSerialize());
    }
}

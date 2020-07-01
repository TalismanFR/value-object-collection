<?php

namespace OGRNIP;

use PHPUnit\Framework\TestCase;
use services\valueobjects\common\contracts\ValueObject;
use services\valueobjects\OGRNIP\Ogrnip;

class OgrnipTest extends TestCase
{

    public function test__construct()
    {
        $ogrnip = new Ogrnip('316420500092234');
        self::assertInstanceOf(ValueObject::class, $ogrnip);
        return $ogrnip;
    }

    public function testConstructBad()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Ogrnip('416420500092234');
    }

    /**
     * @depends test__construct
     */
    public function test__toString(Ogrnip $ogrnip)
    {
        self::assertEquals('316420500092234', $ogrnip->__toString());
    }

    /**
     * @depends test__construct
     * @param Ogrnip $ogrnip
     */
    public function testGetOgrnip(Ogrnip $ogrnip)
    {
        self::assertEquals('316420500092234', $ogrnip->getOgrnip());
    }

    /**
     * @depends test__construct
     * @param Ogrnip $ogrnip
     */
    public function testJsonSerialize(Ogrnip $ogrnip)
    {
        self::assertEquals('316420500092234', $ogrnip->jsonSerialize());
    }
}

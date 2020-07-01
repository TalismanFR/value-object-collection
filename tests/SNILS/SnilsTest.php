<?php

namespace SNILS;

use PHPUnit\Framework\TestCase;
use services\valueobjects\common\contracts\ValueObject;
use services\valueobjects\SNILS\Snils;

class SnilsTest extends TestCase
{

    /**
     * @depends test__construct
     * @param Snils $snils
     */
    public function testJsonSerialize(Snils $snils)
    {
        self::assertEquals('16675209900', $snils->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param Snils $snils
     */
    public function test__toString(Snils $snils)
    {
        self::assertEquals('16675209900', $snils->__toString());
    }

    /**
     * @depends test__construct
     * @param Snils $snils
     */
    public function testGetSnils(Snils $snils)
    {
        self::assertEquals('16675209900', $snils->getSnils());
    }

    public function test__construct()
    {
        $snils = new Snils('16675209900');
        self::assertInstanceOf(ValueObject::class, $snils);
        return $snils;
    }

    public function testConstructBad()
    {
        self::expectException(\InvalidArgumentException::class);
        new Snils('26675209900');
    }
}

<?php

namespace INN;

use PHPUnit\Framework\TestCase;
use services\valueobjects\INN\Inn;

class InnTest extends TestCase
{
    /**
     * @depends test__construct
     * @param Inn $inn
     */
    public function testJsonSerialize(Inn $inn)
    {
        self::assertEquals('422194674902', $inn->jsonSerialize());
    }

    public function test__construct()
    {
        $inn = new Inn('422194674902');

        self::assertInstanceOf(\services\valueobjects\INN\contract\Inn::class, $inn);

        return $inn;
    }

    public function test__constructExeption()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Inn('112233d');
    }

    /**
     * @depends test__construct
     */
    public function testGetInn(Inn $inn)
    {
        self::assertEquals('422194674902', $inn->getInn());
    }

    /**
     * @depends test__construct
     * @param Inn $inn
     */
    public function test__toString(Inn $inn)
    {
        self::assertEquals('422194674902', $inn->__toString());
    }
}

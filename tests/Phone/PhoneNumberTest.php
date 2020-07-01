<?php

namespace Phone;

use PHPUnit\Framework\TestCase;
use services\valueobjects\common\contracts\ValueObject;
use services\valueobjects\Phone\PhoneNumber;

class PhoneNumberTest extends TestCase
{

    public function test__construct()
    {
        $phone = new PhoneNumber('+79675319129');
        self::assertInstanceOf(ValueObject::class, $phone);
        return $phone;
    }

    public function testConstructBad()
    {
        $this->expectException(\InvalidArgumentException::class);
        $phone = new PhoneNumber('+700000000000');
    }

    /**
     * @depends test__construct
     */
    public function testGetPhoneNumber(PhoneNumber $phoneNumber)
    {
        self::assertEquals('+79675319129', $phoneNumber->getPhoneNumber());
    }

    /**
     * @depends test__construct
     * @param PhoneNumber $phoneNumber
     */
    public function test__toString(PhoneNumber $phoneNumber)
    {
        self::assertEquals('+79675319129', $phoneNumber->__toString());
    }
}

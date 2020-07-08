<?php

namespace Email;

use PHPUnit\Framework\TestCase;
use services\valueobjects\Email\Email;

class EmailTest extends TestCase
{

    public function test__construct()
    {
        $email = new Email('anat-gor@ya.ru');
        self::assertInstanceOf(\services\valueobjects\Email\contract\Email::class, $email);

        return $email;
    }


    /**
     * @depends test__construct
     * @param Email $email
     */
    public function testGetMailBox(Email $email)
    {
        self::assertEquals('anat-gor', $email->getMailBox());
    }

    /**
     * @depends test__construct
     * @param Email $email
     */
    public function testGetHost(Email $email)
    {
        self::assertEquals('ya.ru', $email->getHost());
    }

    /**
     * @depends test__construct
     * @param Email $email
     */
    public function testGetEmail(Email $email)
    {
        self::assertEquals('anat-gor@ya.ru', $email->getEmail());
    }

    /**
     * @depends test__construct
     * @param Email $email
     */
    public function testChangeMailBox(Email $email)
    {
        $newMail = $email->changeMailBox('gor');
        self::assertEquals('anat-gor', $email->getMailBox());
        self::assertEquals('gor', $newMail->getMailBox());
        self::assertFalse($newMail->equals($email));
    }

    /**
     * @depends test__construct
     * @param Email $email
     */
    public function test__toString(Email $email)
    {
        self::assertEquals('anat-gor@ya.ru', $email->__toString());
    }

    /**
     * @depends test__construct
     * @param Email $email
     */
    public function testJsonSerialize(Email $email)
    {
        self::assertEquals('anat-gor@ya.ru', $email->jsonSerialize());
    }
}

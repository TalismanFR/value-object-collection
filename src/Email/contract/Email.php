<?php


namespace services\valueobjects\Email\contract;


use services\valueobjects\common\contracts\ValueObject;

interface Email extends ValueObject
{
    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getMailBox(): string;

    /**
     * @param string $newMailbox
     * @return \services\valueobjects\Email\Email
     */
    public function changeMailBox(string $newMailbox): self;
}
<?php


namespace services\valueobjects\Email;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use services\valueobjects\common\ValueObject;

class Email extends ValueObject implements \services\valueobjects\Email\contract\Email
{

    /** @var string $email */
    private string $email;

    /** @var string $mailBox */
    private string $mailBox;

    /** @var string $host */
    private string $host;

    /**
     *
     * @param string $value The email to set in the object
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $value)
    {
        $validator = new EmailValidator();

        if (!$validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException('Email is not valid');
        }

        $this->email = $value;

        [$this->mailBox, $this->host] = explode('@', $this->email);
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getMailBox(): string
    {
        return $this->mailBox;
    }

    /**
     * @param string $newMailbox
     * @return $this
     */
    public function changeMailBox(string $newMailbox): self
    {
        $copy = clone $this;
        $copy->mailBox = $newMailbox;
        $copy->email = $copy->mailBox . '@' . $copy->host;

        return $copy;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function __toString()
    {
        return sprintf('%s@%s', $this->mailBox, $this->host);
    }

    public function jsonSerialize()
    {
        return $this->__toString();
    }
}

<?php

namespace App\DataTransferObject\Request;

use App\Contracts\ServiceRequestInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserDto implements ServiceRequestInterface
{
    /**
     * @Assert\NotBlank()
     */
    private string $firstName;

    /**
     * @Assert\NotBlank()
     */
    private string $lastName;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

}

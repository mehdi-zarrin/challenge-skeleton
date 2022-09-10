<?php

namespace App\DataTransferObject\Response;

use App\Contracts\ServiceResponseInterface;

class UserResponseDto implements ServiceResponseInterface
{
    use HasStatusCode;

    private float $firstName;
    private float $lastName;

    /**
     * @return float
     */
    public function getFirstName(): float
    {
        return $this->firstName;
    }

    /**
     * @param float $firstName
     */
    public function setFirstName(float $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return float
     */
    public function getLastName(): float
    {
        return $this->lastName;
    }

    /**
     * @param float $lastName
     */
    public function setLastName(float $lastName): void
    {
        $this->lastName = $lastName;
    }
}

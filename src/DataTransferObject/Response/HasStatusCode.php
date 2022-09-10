<?php

namespace App\DataTransferObject\Response;
use Symfony\Component\HttpFoundation\Response;

trait HasStatusCode
{
    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return Response::HTTP_OK;
    }
}
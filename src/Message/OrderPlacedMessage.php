<?php

namespace App\Message;

class OrderPlacedMessage
{
    public function __construct(private string $orderId)
    {
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }
}
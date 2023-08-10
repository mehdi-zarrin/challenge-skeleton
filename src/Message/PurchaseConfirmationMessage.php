<?php

namespace App\Message;

class PurchaseConfirmationMessage
{
    public function __construct(private string $orderId)
    {
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }
}
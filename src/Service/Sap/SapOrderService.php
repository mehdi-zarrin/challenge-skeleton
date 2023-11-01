<?php

namespace App\Service\Sap;

use App\Message\OrderCanceledMessage;
use App\Message\OrderPlacedMessage;

class SapOrderService
{
    public function createOrder(OrderPlacedMessage $orderPlacedMessage)
    {
        // do some steps to create the order

        // simulating the failure
        throw new \Exception('Could not create the order in SAP');
    }

    public function cancelOrder(OrderCanceledMessage $orderCanceledMessage)
    {
        // do the neccessary steps to cancel the order

        // simulate order cancellation
        throw new \Exception('could not cancel the order');
    }
}
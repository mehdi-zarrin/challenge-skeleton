<?php

namespace App\MessageHandler;

use App\Message\OrderCanceledMessage;
use App\Service\Sap\SapOrderService;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class OrderCanceledHandler implements MessageHandlerInterface
{
    public function __construct(private SapOrderService $orderService)
    {
    }

    public function __invoke(OrderCanceledMessage $canceledMessage)
    {
        $this->orderService->cancelOrder($canceledMessage);
    }
}
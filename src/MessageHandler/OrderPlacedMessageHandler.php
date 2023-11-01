<?php

namespace App\MessageHandler;

use App\Message\OrderPlacedMessage;
use App\Service\Sap\SapOrderService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Exception\RejectRedeliveredMessageException;
use Symfony\Component\Messenger\Exception\UnrecoverableMessageHandlingException;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;


class OrderPlacedMessageHandler implements MessageHandlerInterface
{
    public function __construct(private SapOrderService $orderService )
    {
    }

    public function __invoke(OrderPlacedMessage $message)
    {
        $this->orderService->createOrder($message);
    }
}